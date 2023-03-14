<?php

namespace Database\Factories;

use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
//        User::factory()->count(50)->state(new \Illuminate\Database\Eloquent\Factories\Sequence(fn (\Illuminate\Database\Eloquent\Factories\Sequence $sequence) =>['city' => \App\Models\Location::get('name')->random()],))->hasReviews(10)->create()
        return [
            'text' => fake()->realText(500),
            'rating' => fake()->randomFloat(10,1,10),
            'user_id' => User::all('id')->random(),
            'restaurant_id' => Restaurant::all('id')->random(),
        ];
    }
}
