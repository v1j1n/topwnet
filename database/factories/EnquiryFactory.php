<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Enquiry>
 */
class EnquiryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'service_name' => fake()->randomElement([
                'Web Development',
                'Mobile App Development',
                'Digital Marketing',
                'UI/UX Design',
                'Consulting Services',
                'Cloud Solutions',
                'E-commerce Development',
            ]),
            'message' => fake()->paragraphs(3, true),
        ];
    }
}
