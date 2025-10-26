<?php

namespace Database\Seeders;

use App\Models\AboutUs;
use Illuminate\Database\Seeder;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AboutUs::create([
            // General Info
            'title' => 'Welcome to Our Story',
            'description' => '<h2>About Our Company</h2><p>We are a leading technology company dedicated to delivering innovative solutions that transform businesses and improve lives. With over two decades of experience, we have established ourselves as trusted partners in digital transformation.</p><p>Our team of experts combines technical excellence with creative problem-solving to deliver exceptional results for our clients worldwide.</p>',
            'chairman_name' => 'John Anderson',
            'designation' => 'Chairman & CEO',
            'about_section_image' => 'about/section/hero-image.jpg',
            'company_profile_file' => 'about/profiles/company-profile-2024.pdf',
            'year_of_innovation' => 2000,
            'successful_projects' => 450,
            'client_retention' => 96,

            // Mission & Vision
            'mission' => 'To empower businesses through innovative technology solutions',
            'mission_points' => [
                ['point' => 'Deliver cutting-edge solutions that drive business growth'],
                ['point' => 'Foster innovation and continuous improvement'],
                ['point' => 'Build long-lasting partnerships based on trust and excellence'],
                ['point' => 'Create value for our clients, employees, and stakeholders'],
            ],

            'vision' => 'To be the global leader in technology innovation and digital transformation',
            'vision_points' => [
                ['point' => 'Lead the industry in technological advancement'],
                ['point' => 'Expand our global presence across all major markets'],
                ['point' => 'Set new standards for quality and customer satisfaction'],
            ],

            'our_values' => 'Our core values define who we are and guide everything we do',
            'our_values_points' => [
                ['point' => 'Integrity - We act with honesty and transparency'],
                ['point' => 'Excellence - We strive for exceptional quality in everything we do'],
                ['point' => 'Innovation - We embrace change and pursue creative solutions'],
                ['point' => 'Collaboration - We work together to achieve common goals'],
                ['point' => 'Customer Focus - We put our clients at the center of everything'],
            ],

            'client_satisfaction' => 98,
            'projects_delivered' => 650,
            'vision_mission_image' => 'about/vision/mission-vision.jpg',
        ]);
    }
}
