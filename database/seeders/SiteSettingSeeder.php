<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SiteSetting::create([
            // General Settings - Contact Information
            'emails' => [
                ['email' => 'info@company.com'],
                ['email' => 'support@company.com'],
                ['email' => 'sales@company.com'],
            ],
            'mobile_numbers' => [
                ['phone' => '+1 (555) 123-4567'],
                ['phone' => '+1 (555) 987-6543'],
            ],
            'address' => '123 Business Avenue, Suite 100, New York, NY 10001, USA',
            'footer_note' => '© 2025 Your Company. All rights reserved.',

            // Social Media Links
            'facebook_url' => 'https://facebook.com/yourcompany',
            'instagram_url' => 'https://instagram.com/yourcompany',
            'x_url' => 'https://x.com/yourcompany',
            'linkedin_url' => 'https://linkedin.com/company/yourcompany',

            // Google Map
            'google_map_url' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3024.2219901290355!2d-74.00369368400567!3d40.71312937933195!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a3162c0c4e1%3A0x42a7e3c65a59c0e!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2s!4v1635789012345!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',

            // Page Banners
            'client_banner' => 'banners/client-banner.jpg',
            'partner_banner' => 'banners/partner-banner.jpg',
            'contact_banner' => 'banners/contact-banner.jpg',
            'aboutus_banner' => 'banners/aboutus-banner.jpg',
            'services_banner' => 'banners/services-banner.jpg',
        ]);
    }
}
