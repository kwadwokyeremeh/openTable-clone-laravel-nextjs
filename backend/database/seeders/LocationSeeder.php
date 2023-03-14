<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Location::create(['name' => 'ottawa', 'created_at' => now(), 'updated_at' => now()]);
        Location::create(['name' => 'toronto', 'created_at' => now(), 'updated_at' => now()]);
        Location::create(['name' => 'niagara', 'created_at' => now(), 'updated_at' => now()]);
    }
}
