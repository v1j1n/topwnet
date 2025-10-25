<?php

namespace Database\Seeders;

use App\Models\ServiceHomeSetting;
use Illuminate\Database\Seeder;

class ServiceHomeSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ServiceHomeSetting::firstOrCreate(
            ['id' => 1],
            [
                'title' => 'Our Services',
                'heading' => 'What We Offer',
                'description' => '<p>We provide comprehensive services tailored to your needs.</p>',
                'highlights' => [
                    ['highlight_item' => 'Professional Excellence'],
                    ['highlight_item' => 'Customer Satisfaction'],
                    ['highlight_item' => 'Innovative Solutions'],
                ],
                'offerings' => [
                    ['title' => 'Consulting Services', 'number_tag' => '01'],
                    ['title' => 'Development Solutions', 'number_tag' => '02'],
                    ['title' => 'Support & Maintenance', 'number_tag' => '03'],
                ],
            ]
        );
    }
}
