<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SiteSetting>
 */
class SiteSettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // General Settings
            'emails' => [
                ['email' => 'info@company.com'],
                ['email' => 'support@company.com'],
            ],
            'mobile_numbers' => [
                ['phone' => '+1 (555) 123-4567'],
                ['phone' => '+1 (555) 987-6543'],
            ],
            'address' => fake()->address(),
            'footer_note' => fake()->sentence(8),
            'facebook_url' => 'https://facebook.com/company',
            'instagram_url' => 'https://instagram.com/company',
            'x_url' => 'https://x.com/company',
            'linkedin_url' => 'https://linkedin.com/company/company',
            'google_map_url' => '<iframe src="https://www.google.com/maps/embed?pb=..." width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
            // Page Banners
            'client_banner' => 'banners/client-banner.jpg',
            'partner_banner' => 'banners/partner-banner.jpg',
            'contact_banner' => 'banners/contact-banner.jpg',
            'aboutus_banner' => 'banners/aboutus-banner.jpg',
            'services_banner' => 'banners/services-banner.jpg',
        ];
    }
}
