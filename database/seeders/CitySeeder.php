<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder {

    /**
     * Run the database seeds.
     */
    public function run(): void {
        $cities = [
            "Valencia",
            "Barcelona",
            "Madrid",
            "Sevilla",
        ];

        foreach ($cities as $city) {
            \App\Models\City::create([
                'name' => $city,
            ]);
        }
    }

}
