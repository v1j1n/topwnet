<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->words(3, true).' Client Group',
            'clients_list' => [
                ['client_name' => fake()->company(), 'sort_order' => 1],
                ['client_name' => fake()->company(), 'sort_order' => 2],
                ['client_name' => fake()->company(), 'sort_order' => 3],
            ],
            'status' => fake()->randomElement(['Active', 'Inactive']),
            'sort_order' => fake()->numberBetween(1, 100),
        ];
    }
}
