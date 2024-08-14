<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecificationCategorySeeder extends Seeder {

    /**
     * Run the database seeds.
     */
    public function run(): void {
        $categories = [
            [
                'name' => 'Size',
                'is_showcase' => TRUE,
                'icon' => 'uil-compress-arrows',
            ],
            [
                'name' => 'Beds',
                'is_showcase' => TRUE,
                'icon' => 'uil-bed-double',
            ],
            [
                'name' => 'Baths',
                'is_showcase' => TRUE,
                'icon' => 'uil-bath',
            ],
        ];

        foreach ($categories as $category) {
            \App\Models\SpecificationCategory::create([
                'name' => $category['name'],
                'is_showcase' => $category['is_showcase'],
                'icon' => $category['icon'],
            ]);
        }
    }

}
