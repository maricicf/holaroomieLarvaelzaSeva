<?php

namespace App\Repositories\Property;

use App\Models\Address;
use App\Models\PriceCategory;
use App\Models\Property;
use App\Models\SpecificationCategory;
use App\Repositories\IResourceRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PropertyRepository implements IResourceRepository {

    public function all($params = []) {
        if (isset($params)) {
            $properties = Property::with([
                'images',
                'specifications',
                'address',
                'area',
                'hotspots',
            ]);
        }

        if (isset($params['number'])) {
            $properties = $properties->take($params['number']);
        }

        // include category with specifications too
        $properties->with('specifications.category');

        if (isset($params['city']) && $params['city'] != 'Select') {
            $properties = $properties->whereHas('area.city',
                function($query) use ($params) {
                    $query->where('name', $params['city']);
                });
        }

        if (isset($params['area']) && $params['area'] != 'Select') {
            $properties = $properties->whereHas('area',
                function($query) use ($params) {
                    $query->where('name', $params['area']);
                });
        }

        if (isset($params['keyword'])) {
            // filter properties by keyword in lowercase and also in the name column
            $properties = $properties->where('title', 'like',
                '%'.strtolower($params['keyword']).'%');
        }
        if (isset($params['date_from']) && isset($params['date_to'])) {
            $startDate = $params['date_from'];
            $endDate = $params['date_to'];

            $properties = $properties->whereDoesntHave('reservations',
                function($query) use ($startDate, $endDate) {
                    $query->where(function($query) use ($startDate, $endDate) {
                        $query->where('start_date', '<=', $endDate)
                            ->where('end_date', '>=', $startDate);
                    });
                });
        }
        elseif (isset($params['date_from'])) {
            $startDate = $params['date_from'];

            $properties = $properties->whereDoesntHave('reservations',
                function($query) use ($startDate) {
                    $query->where('end_date', '>', $startDate);
                });
        }
        elseif (isset($params['date_to'])) {
            $endDate = $params['date_to'];

            $properties = $properties->whereDoesntHave('reservations',
                function($query) use ($endDate) {
                    $query->where('start_date', '<', $endDate);
                });
        }

        if (isset($params['houseType'])) {
            if ($params['houseType'] == 'Rooms') {
                $properties = $properties->where('apartment_id', '<>', NULL);
            }
            else {
                if ($params['houseType'] == 'Apartments') {
                    $properties = $properties->where('apartment_id', NULL);
                }
            }
        }

        // i want for each price category to get the latest price for this property
        $priceCategories = PriceCategory::all();

        $properties = $properties->get();
        foreach ($properties as $property) {
            $latestPriceArray = [];
            foreach ($priceCategories as $priceCategory) {
                $latestPrice = $property->prices()
                    ->with('category')
                    ->where('price_category_id', $priceCategory->id)
                    ->latest()
                    ->first();

                $latestPriceArray[] = $latestPrice;
            }

            $property->prices = $latestPriceArray;
        }

        if (isset($params['priceRange'])) {
            $minPrice = $params['priceRange'][0];
            $maxPrice = $params['priceRange'][1];

            $properties = $properties->filter(function($property) use (
                $minPrice,
                $maxPrice
            ) {
                // Check if any price in the latestPriceArray meets or exceeds the minPrice
                // and is less than or equal to the maxPrice
                foreach ($property->prices as $price) {
                    if ($price->price >= $minPrice && $price->price <= $maxPrice) {
                        return TRUE;
                    }
                }
                return FALSE;
            })->values();
        }

        if (isset($params['minPrice'])) {
            $minPrice = $params['minPrice'];

            $properties = $properties->filter(function($property) use ($minPrice
            ) {
                // Check if any price in the latestPriceArray meets or exceeds the minPrice
                if ($property->prices[0]->price >= $minPrice) {
                    return TRUE;
                }
                return FALSE;
            })->values();
        }

        if (isset($params['maxPrice'])) {
            $maxPrice = $params['maxPrice'];

            $properties = $properties->filter(function($property) use ($maxPrice
            ) {
                // Check if any price in the latestPriceArray is less than or equal to the maxPrice
                //                foreach ($property->prices as $price) {
                if ($property->prices[0]->price <= $maxPrice) {
                    return TRUE;
                }
                //                }
                return FALSE;
            })->values();
        }

        if (isset($params['specifications'])) {
            // flatten the array of specifications
            $specifications = collect($params['specifications'])->flatten();

            $properties = $properties->filter(function($property) use (
                $specifications
            ) {
                // Check if the property has all the specifications
                foreach ($specifications as $specification) {
                    if (!$property->specifications->contains('id',
                        $specification)) {
                        return FALSE;
                    }
                }
                return TRUE;
            })->values();
        }

        return $properties;
    }

    public function find($id) {
        $property = Property::with([
            'images',
            'specifications.category',
            'address',
            'area',
            'hotspots',
            'reservations',
            'rooms',
            'rooms.images',
        ])->find($id);

        // include category with specifications too
        $property->area->load('city');

        $specificationCategory = SpecificationCategory::all();

        foreach ($specificationCategory as $category) {
            $category->features = $property->specifications->where('specification_category_id',
                $category->id)->values();
        }

        $property->groupedSpecifications = $specificationCategory->toArray();

        // i want for each price category to get the latest price for this property
        $priceCategories = PriceCategory::all();

        $latestPriceArray = [];
        foreach ($priceCategories as $priceCategory) {
            $latestPrice = $property->prices()
                ->with('category')
                ->where('price_category_id', $priceCategory->id)
                ->latest()
                ->first();

            $latestPriceArray[] = $latestPrice;
        }

        $property->prices = $latestPriceArray;

        return $property;
    }

    public function create($data) {
        try {
            DB::beginTransaction();

            $newProperty = new Property();

            $newProperty->title = $data['title'];
            $newProperty->description = $data['description'];
            $newProperty->longitude = $data['coordinates']['longitude'];
            $newProperty->latitude = $data['coordinates']['latitude'];
            $newProperty->available_from = $data['start_date'];
            $newProperty->available_to = $data['end_date'];
            $newProperty->area_id = $data['area_id'];
            $newProperty->size = $data['size'];
            $newProperty->number_of_baths = $data['number_of_baths'];
            $newProperty->number_of_beds = $data['number_of_beds'];

            $newAddress = Address::create([
                'street' => $data['address']['street'],
                'number' => $data['address']['number'],
                'zip_code' => $data['address']['zip'],
                'door' => $data['address']['door'],
                'floor' => $data['address']['floor'],
            ]);

            $newProperty->address_id = $newAddress->id;
            $newProperty->user_id = auth()->id();

            $newProperty->save();

            // prices
            $priceCategories = PriceCategory::all();
            $priceKeys = array_keys($data['price']);
            $i = 0;
            foreach ($priceCategories as $priceCategory) {
                $newProperty->prices()->create([
                    'price' => $data['price'][$priceKeys[$i]],
                    'price_category_id' => $priceCategory->id,
                ]);
                $i++;
            }

            $newProperty->specifications()->attach($data['specifications']);

            // Filter and prepare data
            $filteredHotspotData = array_filter($data['hotspotData'],
                function($value) {
                    return $value !== NULL;
                });

            $attachData = [];
            foreach ($filteredHotspotData as $hotspotId => $minutes) {
                $attachData[$hotspotId] = ['minutes' => $minutes];
            }

            // Attach the filtered data
            $newProperty->hotspots()->attach($attachData);

            foreach ($data['images'] as $image) {
                $hashedName = $image->hashName();
                $newProperty->images()->create([
                    'name' => $image->getClientOriginalName(),
                    'path' => $hashedName,
                ]);

                // store image in storage
                if (!$image->move(public_path('assets/images/property/single'),
                    $hashedName)) {
                    // Log the error or handle it
                    throw new \Exception("Failed to move the image: ".$image->getClientOriginalName());
                }
            }

            DB::commit();
            return $newProperty->id;
        }
        catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function update($id, $data) {
        // TODO: Implement update() method.
    }

    public function delete($id) {
        try {
            DB::beginTransaction();

            $property = Property::find($id);

            $property->images->each(function($image) {
                Storage::delete('public/assets/images/property/single/'.$image->path);
                $image->delete();
            });

            $property->delete();

            DB::commit();
            return TRUE;
        }
        catch (\Exception $e) {
            DB::rollBack();
            throw new \Exception($e->getMessage());
        }
    }

}
