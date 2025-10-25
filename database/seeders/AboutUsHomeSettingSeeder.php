<?php

namespace Database\Seeders;

use App\Models\AboutUsHomeSetting;
use Illuminate\Database\Seeder;

class AboutUsHomeSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AboutUsHomeSetting::firstOrCreate(
            ['id' => 1],
            [
                'title' => 'About Our Company',
                'heading' => 'Welcome to Our Story',
                'description' => '<p>We are dedicated to providing the best service to our customers.</p>',
                'points' => [
                    ['point' => 'Quality Service'],
                    ['point' => 'Experienced Team'],
                    ['point' => '24/7 Support'],
                ],
                'status' => 'active',
                'image' => null,
            ]
        );
    }
}

