<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'decription' => fake()->text(),
            'director' => fake()->name(),
            'star_rating' => random_int(1, 5), //'star_rating' => fake()->numberBetween(1, 5),
            'date_published' => fake()->date()
        ];
    }
}
