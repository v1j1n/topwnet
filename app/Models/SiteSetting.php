<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    /** @use HasFactory<\Database\Factories\SiteSettingFactory> */
    use HasFactory;

    protected $fillable = [
        // General Settings
        'emails',
        'mobile_numbers',
        'address',
        'footer_note',
        'facebook_url',
        'instagram_url',
        'x_url',
        'linkedin_url',
        'google_map_url',
        // Page Banners
        'client_banner',
        'partner_banner',
        'contact_banner',
        'aboutus_banner',
        'services_banner',
    ];

    protected function casts(): array
    {
        return [
            'emails' => 'array',
            'mobile_numbers' => 'array',
        ];
    }
}
