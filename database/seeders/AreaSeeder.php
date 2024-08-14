<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder {

    /**
     * Run the database seeds.
     */
    public function run(): void {
        $areas = [
            [
                'city_id' => City::all()->random()->id,
                'name' => 'Area 1',
            ],
            [
                'city_id' => City::all()->random()->id,
                'name' => 'Area 2',
            ],
            [
                'city_id' => City::all()->random()->id,
                'name' => 'Area 3',
            ],
        ];

        foreach ($areas as $area) {
            \App\Models\Area::create($area);
        }
    }

}
