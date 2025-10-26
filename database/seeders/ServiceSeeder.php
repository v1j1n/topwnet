<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'image' => 'services/carousel/consulting.jpg',
                'alt_text' => 'Professional Consulting Services',
                'primary_label' => 'Expert Advice',
                'secondary_label' => 'Strategic Solutions',
                'title' => 'Business Consulting',
                'title_hover' => 'Transform Your Business',
                'big_image' => 'services/detail/consulting-hero.jpg',
                'description' => '<p>Our consulting services help you navigate complex business challenges and achieve sustainable growth.</p>',
                'sort_order' => 1,
                'status' => 'Active',
            ],
            [
                'image' => 'services/carousel/development.jpg',
                'alt_text' => 'Custom Development Solutions',
                'primary_label' => 'Innovation',
                'secondary_label' => 'Technology',
                'title' => 'Software Development',
                'title_hover' => 'Build The Future',
                'big_image' => 'services/detail/development-hero.jpg',
                'description' => '<p>We create cutting-edge software solutions tailored to your specific business needs.</p>',
                'sort_order' => 2,
                'status' => 'Active',
            ],
            [
                'image' => 'services/carousel/support.jpg',
                'alt_text' => 'Reliable Support Services',
                'primary_label' => '24/7 Support',
                'secondary_label' => 'Always Available',
                'title' => 'Technical Support',
                'title_hover' => 'We\'re Here To Help',
                'big_image' => 'services/detail/support-hero.jpg',
                'description' => '<p>Round-the-clock technical support to keep your systems running smoothly.</p>',
                'sort_order' => 3,
                'status' => 'Active',
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
