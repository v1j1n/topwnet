<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Partner>
 */
class PartnerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'slug' => fake()->unique()->slug(),
            'logo' => 'partners/placeholder.png',
            'short_description' => fake()->sentence(12),
            'sort_order' => fake()->numberBetween(1, 100),
            'status' => fake()->randomElement(['Active', 'Inactive']),
        ];
    }
}
