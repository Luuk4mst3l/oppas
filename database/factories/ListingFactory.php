<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Listing;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'start_date' => fake()->date(),
            'end_date' => now(),
            'location' => fake()->city(),
            'tags' => fake()->randomElements(['kat', 'hond', 'eend', 'hamster', 'cavia', 'konijn', 'slang', 'hagedis', 'vis'], $count = 3, false),
            'description' => fake()->paragraph(5),
            'hourly_rate' => random_int(5, 50)
        ];
        
    }
}
