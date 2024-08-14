<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Image;
use App\Models\Price;
use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory {

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        return [
            'title' => fake()->sentence,
            'description' => fake()->paragraph,
            'latitude' => fake()->latitude,
            'longitude' => fake()->longitude,
            'available_from' => fake()->date,
            'available_to' => fake()->date,
            'user_id' => \App\Models\User::all()->random()->id,
            'address_id' => Address::factory(),
            'area_id' => \App\Models\Area::all()->random()->id,
        ];
    }

    // You can define an 'afterCreating' callback to associate the price
    public function configure() {
        return $this->afterCreating(function(Property $property) {
            Price::create([
                'property_id' => $property->id,
                // Associate the price with the property
                'price' => fake()->numberBetween(100, 1000),
                'price_category_id' => \App\Models\PriceCategory::where('name',
                    'Per Month')->first()->id,
            ]);

            Price::create([
                'property_id' => $property->id,
                // Associate the price with the property
                'price' => fake()->numberBetween(10, 100),
                'price_category_id' => \App\Models\PriceCategory::where('name',
                    'Per Day')->first()->id,
            ]);

            Price::create([
                'property_id' => $property->id,
                // Associate the price with the property
                'price' => fake()->numberBetween(50, 500),
                'price_category_id' => \App\Models\PriceCategory::where('name',
                    'Per Week')->first()->id,
            ]);

            for ($i = 0; $i < 3; $i++) {
                Image::create([
                    'imageable_id' => $property->id,
                    'imageable_type' => Property::class,
                    'path' => $i + 1 .'.jpg',
                    'name' => 'Image '.$i + 1,
                ]);
            }

            $property->specifications()->attach([2, 5, 7]);
        });
    }

}
