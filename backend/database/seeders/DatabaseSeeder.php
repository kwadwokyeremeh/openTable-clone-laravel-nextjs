<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            LocationSeeder::class,
            CuisineSeeder::class,
            RestaurantSeeder::class,
            ItemsSeeder::class,
        ]);
        User::factory()->count(50)->hasReviews(10)->create();
    }
}
