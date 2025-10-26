<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    /** @use HasFactory<\Database\Factories\AboutUsFactory> */
    use HasFactory;

    protected $fillable = [
        // General Info
        'title',
        'description',
        'chairman_name',
        'designation',
        'about_section_image',
        'company_profile_file',
        'year_of_innovation',
        'successful_projects',
        'client_retention',
        // Mission & Vision
        'mission',
        'mission_points',
        'vision',
        'vision_points',
        'our_values',
        'our_values_points',
        'client_satisfaction',
        'projects_delivered',
        'vision_mission_image',
    ];

    protected function casts(): array
    {
        return [
            'mission_points' => 'array',
            'vision_points' => 'array',
            'our_values_points' => 'array',
            'year_of_innovation' => 'integer',
            'successful_projects' => 'integer',
            'client_retention' => 'integer',
            'client_satisfaction' => 'integer',
            'projects_delivered' => 'integer',
        ];
    }
}
