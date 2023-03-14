<?php

namespace Database\Seeders;

use App\Models\Cuisine;
use Illuminate\Database\Seeder;

class CuisineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cuisine::create(['name' => 'indian', 'created_at' => now(), 'updated_at' => now()]);
        Cuisine::create(['name' => 'italian', 'created_at' => now(), 'updated_at' => now()]);
        Cuisine::create(['name' => 'mexican', 'created_at' => now(), 'updated_at' => now()]);
    }
}
