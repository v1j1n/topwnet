<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AboutUs>
 */
class AboutUsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // General Info
            'title' => fake()->sentence(4),
            'description' => fake()->paragraphs(3, true),
            'chairman_name' => fake()->name(),
            'designation' => fake()->randomElement(['Chairman', 'CEO', 'Managing Director', 'Founder & CEO']),
            'about_section_image' => 'about/section-image.jpg',
            'company_profile_file' => 'about/company-profile.pdf',
            'year_of_innovation' => fake()->year(),
            'successful_projects' => fake()->numberBetween(50, 500),
            'client_retention' => fake()->numberBetween(80, 99),
            // Mission & Vision
            'mission' => fake()->sentence(8),
            'mission_points' => [
                fake()->sentence(6),
                fake()->sentence(7),
                fake()->sentence(6),
            ],
            'vision' => fake()->sentence(8),
            'vision_points' => [
                fake()->sentence(6),
                fake()->sentence(7),
                fake()->sentence(6),
            ],
            'our_values' => fake()->sentence(8),
            'our_values_points' => [
                fake()->sentence(5),
                fake()->sentence(6),
                fake()->sentence(5),
            ],
            'client_satisfaction' => fake()->numberBetween(90, 100),
            'projects_delivered' => fake()->numberBetween(100, 1000),
            'vision_mission_image' => 'about/vision-mission.jpg',
        ];
    }
}
