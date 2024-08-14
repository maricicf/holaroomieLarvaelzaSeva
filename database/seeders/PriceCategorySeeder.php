<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PriceCategorySeeder extends Seeder {

    /**
     * Run the database seeds.
     */
    public function run(): void {
        $categories = [
            "Per Day",
            "Per Week",
            "Per Month",
        ];

        foreach ($categories as $category) {
            \App\Models\PriceCategory::create([
                'name' => $category,
            ]);
        }
    }

}
