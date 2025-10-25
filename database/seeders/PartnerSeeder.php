<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Partner::create([
            'name' => 'TechCorp Solutions',
            'slug' => 'techcorp-solutions',
            'logo' => 'partners/techcorp.png',
            'short_description' => 'Leading provider of enterprise technology solutions and digital transformation services.',
            'sort_order' => 1,
            'status' => 'Active',
        ]);

        Partner::create([
            'name' => 'Global Innovations Inc',
            'slug' => 'global-innovations',
            'logo' => 'partners/global-innovations.png',
            'short_description' => 'Innovative technology partner specializing in cloud computing and AI solutions.',
            'sort_order' => 2,
            'status' => 'Active',
        ]);

        Partner::create([
            'name' => 'Digital Ventures',
            'slug' => 'digital-ventures',
            'logo' => 'partners/digital-ventures.png',
            'short_description' => 'Strategic partner for digital marketing and e-commerce solutions.',
            'sort_order' => 3,
            'status' => 'Active',
        ]);

        Partner::create([
            'name' => 'CloudTech Systems',
            'slug' => 'cloudtech-systems',
            'logo' => 'partners/cloudtech.png',
            'short_description' => 'Cloud infrastructure and cybersecurity solutions provider.',
            'sort_order' => 4,
            'status' => 'Active',
        ]);

        Partner::create([
            'name' => 'DataWise Analytics',
            'slug' => 'datawise-analytics',
            'logo' => 'partners/datawise.png',
            'short_description' => 'Business intelligence and data analytics solutions partner.',
            'sort_order' => 5,
            'status' => 'Inactive',
        ]);
    }
}
