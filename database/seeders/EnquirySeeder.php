<?php

namespace Database\Seeders;

use App\Models\Enquiry;
use Illuminate\Database\Seeder;

class EnquirySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create sample enquiries with different services
        Enquiry::create([
            'name' => 'Sarah Johnson',
            'email' => 'sarah.johnson@example.com',
            'phone' => '+1 (555) 234-5678',
            'service_name' => 'Web Development',
            'message' => 'Hi, I\'m looking to build a modern e-commerce website for my boutique clothing store. I need something user-friendly with payment integration and inventory management. Can you help?',
            'created_at' => now()->subDays(5),
        ]);

        Enquiry::create([
            'name' => 'Michael Chen',
            'email' => 'michael.chen@techstartup.com',
            'phone' => '+1 (555) 345-6789',
            'service_name' => 'Mobile App Development',
            'message' => 'We\'re a startup looking to develop a cross-platform mobile app for our food delivery service. We need iOS and Android versions with real-time tracking.',
            'created_at' => now()->subDays(3),
        ]);

        Enquiry::create([
            'name' => 'Emily Rodriguez',
            'email' => 'emily.r@gmail.com',
            'phone' => '+1 (555) 456-7890',
            'service_name' => 'Digital Marketing',
            'message' => 'I need help with SEO and social media marketing for my consulting business. Looking for a comprehensive digital marketing strategy.',
            'created_at' => now()->subDays(2),
        ]);

        Enquiry::create([
            'name' => 'David Thompson',
            'email' => 'david@Thompson-law.com',
            'service_name' => 'UI/UX Design',
            'message' => 'Our law firm website needs a complete redesign. We want a modern, professional look that builds trust with potential clients.',
            'created_at' => now()->subDays(1),
        ]);

        Enquiry::create([
            'name' => 'Lisa Martinez',
            'email' => 'lisa.martinez@healthcare.org',
            'phone' => '+1 (555) 567-8901',
            'service_name' => 'Cloud Solutions',
            'message' => 'We need to migrate our healthcare management system to the cloud. Looking for secure, HIPAA-compliant solutions.',
            'created_at' => now()->subHours(12),
        ]);

        Enquiry::create([
            'name' => 'James Wilson',
            'email' => 'james.wilson@example.com',
            'phone' => '+1 (555) 678-9012',
            'service_name' => 'Consulting Services',
            'message' => 'Interested in IT consulting services for digital transformation. Our company has about 200 employees and we need expert guidance.',
            'created_at' => now()->subHours(6),
        ]);

        Enquiry::create([
            'name' => 'Amanda Foster',
            'email' => 'amanda@fashionbrand.com',
            'service_name' => 'E-commerce Development',
            'message' => 'Looking to expand our fashion brand online. Need a sophisticated e-commerce platform with international shipping capabilities.',
            'created_at' => now()->subHours(2),
        ]);

        // Create a few more using factory for variety
        Enquiry::factory()->count(8)->create();
    }
}
