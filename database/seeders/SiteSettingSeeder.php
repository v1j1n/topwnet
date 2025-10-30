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
        SiteSetting::updateOrCreate(
            ['id' => 1],
            [
                // General Settings - Contact Information
                'emails' => [
                    'sales@topwnet.com',
                    'support@topwnet.com',
                ],
                'mobile_numbers' => [
                    '+965 22445419',
                    '+965 22445391',
                    '+965 94411744',
                    '+965 50410555',
                ],
                'address' => 'Kuwait City, Al Qibla, Block 13, Al Soor Street, Al Marzook Building. Third Floor, Office No. 15',
                'footer_note' => 'Top World Networks is a leading IT solutions provider in Kuwait.',

                // Social Media Links
                'facebook_url' => 'https://facebook.com/topworldnetworks',
                'instagram_url' => 'https://instagram.com/topworldnetworks',
                'x_url' => 'https://x.com/topworldnetworks',
                'linkedin_url' => 'https://linkedin.com/company/topworldnetworks',

                // Google Map
                'google_map_url' => null,

                // Page Banners
                'client_banner' => null,
                'partner_banner' => null,
                'contact_banner' => null,
                'aboutus_banner' => null,
                'services_banner' => null,
            ]
        );
    }
}
