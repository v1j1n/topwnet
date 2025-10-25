<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Banner>
 */
class BannerFactory extends Factory
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
            'heading_1' => fake()->sentence(4),
            'heading_2' => fake()->sentence(4),
            'description' => fake()->paragraph(),
            'status' => fake()->boolean(80),
            'sort_order' => fake()->numberBetween(1, 100),
            'image' => 'banners/placeholder.jpg',
        ];
    }
}
