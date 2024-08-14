<?php

namespace App\Repositories\Property;

use App\Models\Price;
use App\Models\PriceCategory;
use App\Models\Property;
use App\Repositories\IResourceRepository;

class PropertyRepository implements IResourceRepository {

    public function all($params = []) {
        $properties = Property::with([
            'images',
            'specifications',
            'address',
            'area',
            'hotspots',
        ]);
        if (isset($params['number'])) {
            $properties = $properties->take($params['number']);
        }

        // include category with specifications too
        $properties->with('specifications.category');
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

        return $properties;
    }

    public function find($id) {
        $property = Property::with([
            'images',
            'specifications',
            'address',
            'area',
            'hotspots',
        ])->find($id);

        // include category with specifications too
        $property->specifications->load('category');
        $property->area->load('city');

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
        Property::factory()->count(10)->create();
    }

    public function update($id, $data) {
        // TODO: Implement update() method.
    }

    public function delete($id) {
        // TODO: Implement delete() method.
    }

}
