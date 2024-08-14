<?php

namespace Database\Seeders;

use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    /**
     * Seed the application's database.
     */
    public function run(): void {
        // User::factory(10)->create();

        // run the seeders
        $this->call(RoleSeeder::class);
        $this->call(FaqCategorySeeder::class);
        $this->call(SpecificationCategorySeeder::class);
        $this->call(PriceCategorySeeder::class);
        $this->call(SpecificationSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(AreaSeeder::class);
    }

}
