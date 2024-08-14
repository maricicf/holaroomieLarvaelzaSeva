<?php

namespace Database\Seeders;

use App\Models\SpecificationCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecificationSeeder extends Seeder {

    /**
     * Run the database seeds.
     */
    public function run(): void {
        $specifications = [
            [
                'name' => '72',
                'specification_category_id' => SpecificationCategory::where('name',
                    'Size')->first()->id,
            ],
            [
                'name' => '44',
                'specification_category_id' => SpecificationCategory::where('name',
                    'Size')->first()->id,
            ],
            [
                'name' => '22',
                'specification_category_id' => SpecificationCategory::where('name',
                    'Size')->first()->id,
            ],
            [
                'name' => '3 Beds',
                'specification_category_id' => SpecificationCategory::where('name',
                    'Beds')->first()->id,
            ],
            [
                'name' => '1 Bed',
                'specification_category_id' => SpecificationCategory::where('name',
                    'Beds')->first()->id,
            ],
            [
                'name' => '2 Beds',
                'specification_category_id' => SpecificationCategory::where('name',
                    'Beds')->first()->id,
            ],
            [
                'name' => '1 Bath',
                'specification_category_id' => SpecificationCategory::where('name',
                    'Baths')->first()->id,
            ],
            [
                'name' => '2 Baths',
                'specification_category_id' => SpecificationCategory::where('name',
                    'Baths')->first()->id,
            ],
        ];

        foreach ($specifications as $specification) {
            \App\Models\Specification::create([
                'name' => $specification['name'],
                'specification_category_id' => $specification['specification_category_id'],
            ]);
        }
    }

}
