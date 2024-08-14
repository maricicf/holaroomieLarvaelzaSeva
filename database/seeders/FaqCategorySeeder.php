<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqCategorySeeder extends Seeder {

    /**
     * Run the database seeds.
     */
    public function run(): void {
        $categories = [
            ['name' => 'How it works'],
            ['name' => 'General Questions'],
            ['name' => 'Payments for packages'],
            ['name' => 'Reservation period'],
        ];

        foreach ($categories as $category) {
            \App\Models\FaqCategory::create($category);
        }
    }

}
