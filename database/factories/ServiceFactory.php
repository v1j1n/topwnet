<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image' => 'services/carousel/placeholder.jpg',
            'alt_text' => fake()->sentence(3),
            'primary_label' => fake()->words(2, true),
            'secondary_label' => fake()->words(3, true),
            'title' => fake()->sentence(4),
            'title_hover' => fake()->sentence(4),
            'big_image' => 'services/detail/placeholder.jpg',
            'description' => fake()->paragraphs(3, true),
            'process' => [
                ['title' => 'Step 1', 'description' => fake()->sentence()],
                ['title' => 'Step 2', 'description' => fake()->sentence()],
                ['title' => 'Step 3', 'description' => fake()->sentence()],
            ],
            'outcomes' => [
                ['title' => 'Outcome 1', 'description' => fake()->sentence()],
                ['title' => 'Outcome 2', 'description' => fake()->sentence()],
            ],
            'sort_order' => fake()->numberBetween(1, 100),
            'status' => fake()->randomElement(['Active', 'Inactive']),
            'meta_title' => fake()->sentence(4),
            'meta_description' => fake()->sentence(15),
            'meta_keywords' => fake()->words(5, true),
            'og_image' => 'services/og/placeholder.jpg',
        ];
    }
}
