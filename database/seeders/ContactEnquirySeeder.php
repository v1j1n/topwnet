<?php

namespace Database\Seeders;

use App\Models\ContactEnquiry;
use Illuminate\Database\Seeder;

class ContactEnquirySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create sample contact enquiries with realistic data
        ContactEnquiry::create([
            'name' => 'John Anderson',
            'email' => 'john.anderson@example.com',
            'phone' => '+1 (555) 123-4567',
            'message' => 'Hi, I found your company online and I\'m interested in learning more about your web development services. Could someone please contact me to discuss a potential project for my small business?',
            'created_at' => now()->subDays(7),
        ]);

        ContactEnquiry::create([
            'name' => 'Maria Garcia',
            'email' => 'maria.garcia@startup.io',
            'phone' => '+1 (555) 234-5678',
            'message' => 'Hello! We\'re a startup looking to build a mobile application. I\'d love to schedule a call to discuss our requirements and get a quote. When would be a good time?',
            'created_at' => now()->subDays(5),
        ]);

        ContactEnquiry::create([
            'name' => 'Robert Kim',
            'email' => 'robert.kim@techcorp.com',
            'phone' => '+1 (555) 345-6789',
            'message' => 'We need help with cloud migration for our enterprise systems. This is urgent - please contact me at your earliest convenience. Looking forward to hearing from you.',
            'created_at' => now()->subDays(4),
        ]);

        ContactEnquiry::create([
            'name' => 'Jennifer Lee',
            'email' => 'jennifer.lee@gmail.com',
            'phone' => '+1 (555) 456-7890',
            'message' => 'I\'m interested in your digital marketing services. My business needs better online visibility. Can you provide information about your packages and pricing?',
            'created_at' => now()->subDays(3),
        ]);

        ContactEnquiry::create([
            'name' => 'Thomas Brown',
            'email' => 'thomas.brown@retail.com',
            'phone' => '+1 (555) 567-8901',
            'message' => 'Our retail company is looking for an e-commerce solution. We currently have 500+ products and need a robust platform. Please send me more details about your e-commerce development services.',
            'created_at' => now()->subDays(2),
        ]);

        ContactEnquiry::create([
            'name' => 'Patricia Davis',
            'email' => 'patricia.davis@nonprofit.org',
            'phone' => '+1 (555) 678-9012',
            'message' => 'Hi there! We\'re a nonprofit organization and we need a website redesign. Do you offer any special rates for nonprofits? We\'d love to work with you.',
            'created_at' => now()->subDay(),
        ]);

        ContactEnquiry::create([
            'name' => 'Daniel Martinez',
            'email' => 'daniel.m@consulting.biz',
            'phone' => '+1 (555) 789-0123',
            'message' => 'I came across your portfolio and I\'m impressed with your work. I need UI/UX design services for a fintech application. Could we set up a meeting to discuss this?',
            'created_at' => now()->subHours(18),
        ]);

        ContactEnquiry::create([
            'name' => 'Linda White',
            'email' => 'linda.white@healthcare.org',
            'phone' => '+1 (555) 890-1234',
            'message' => 'Our healthcare clinic needs a patient management system. Security and HIPAA compliance are critical. Please contact me to discuss the requirements and timeline.',
            'created_at' => now()->subHours(12),
        ]);

        ContactEnquiry::create([
            'name' => 'Christopher Taylor',
            'email' => 'chris.taylor@realestate.com',
            'phone' => '+1 (555) 901-2345',
            'message' => 'Looking for someone to develop a property listing website with advanced search filters and virtual tour integration. What\'s your availability for a new project?',
            'created_at' => now()->subHours(6),
        ]);

        ContactEnquiry::create([
            'name' => 'Susan Miller',
            'email' => 'susan.miller@education.edu',
            'phone' => '+1 (555) 012-3456',
            'message' => 'We\'re an educational institution interested in developing an online learning platform. Can you provide a proposal for this project? Budget is flexible for quality work.',
            'created_at' => now()->subHours(3),
        ]);

        // Create additional random enquiries using factory
        ContactEnquiry::factory()->count(10)->create();
    }
}
