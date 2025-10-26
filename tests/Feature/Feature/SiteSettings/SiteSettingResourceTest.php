<?php

use App\Filament\Resources\SiteSettings\SiteSettingResource;
use App\Models\SiteSetting;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\actingAs;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->user = User::factory()->create();
    actingAs($this->user);
});

test('can create site settings with emails repeater', function () {
    $settings = SiteSetting::create([
        'emails' => [
            ['email' => 'info@company.com'],
            ['email' => 'support@company.com'],
        ],
        'mobile_numbers' => [],
    ]);

    expect($settings->emails)->toBeArray()->toHaveCount(2);
    expect($settings->emails[0]['email'])->toBe('info@company.com');
});

test('can create site settings with mobile numbers repeater', function () {
    $settings = SiteSetting::create([
        'emails' => [],
        'mobile_numbers' => [
            ['phone' => '+1 (555) 123-4567'],
            ['phone' => '+1 (555) 987-6543'],
        ],
    ]);

    expect($settings->mobile_numbers)->toBeArray()->toHaveCount(2);
    expect($settings->mobile_numbers[0]['phone'])->toBe('+1 (555) 123-4567');
});

test('can update site settings with general info', function () {
    $settings = SiteSetting::factory()->create([
        'address' => 'Old Address',
        'footer_note' => 'Old Note',
    ]);

    $settings->update([
        'address' => 'New Address',
        'footer_note' => 'New Footer Note',
    ]);

    expect($settings->refresh())
        ->address->toBe('New Address')
        ->footer_note->toBe('New Footer Note');
});

test('can update site settings with social media links', function () {
    $settings = SiteSetting::factory()->create();

    $settings->update([
        'facebook_url' => 'https://facebook.com/mycompany',
        'instagram_url' => 'https://instagram.com/mycompany',
        'x_url' => 'https://x.com/mycompany',
        'linkedin_url' => 'https://linkedin.com/company/mycompany',
    ]);

    expect($settings->refresh())
        ->facebook_url->toBe('https://facebook.com/mycompany')
        ->instagram_url->toBe('https://instagram.com/mycompany')
        ->x_url->toBe('https://x.com/mycompany')
        ->linkedin_url->toBe('https://linkedin.com/company/mycompany');
});

test('can update google map url', function () {
    $settings = SiteSetting::factory()->create();

    $mapUrl = '<iframe src="https://www.google.com/maps/embed" width="600"></iframe>';
    $settings->update(['google_map_url' => $mapUrl]);

    expect($settings->refresh()->google_map_url)->toBe($mapUrl);
});

test('can update page banners', function () {
    $settings = SiteSetting::factory()->create();

    $settings->update([
        'client_banner' => 'banners/client.jpg',
        'partner_banner' => 'banners/partner.jpg',
        'contact_banner' => 'banners/contact.jpg',
        'aboutus_banner' => 'banners/aboutus.jpg',
        'services_banner' => 'banners/services.jpg',
    ]);

    expect($settings->refresh())
        ->client_banner->toBe('banners/client.jpg')
        ->partner_banner->toBe('banners/partner.jpg')
        ->contact_banner->toBe('banners/contact.jpg')
        ->aboutus_banner->toBe('banners/aboutus.jpg')
        ->services_banner->toBe('banners/services.jpg');
});

test('can add multiple emails', function () {
    $settings = SiteSetting::factory()->create([
        'emails' => [
            ['email' => 'email1@company.com'],
        ],
    ]);

    $settings->update([
        'emails' => [
            ['email' => 'email1@company.com'],
            ['email' => 'email2@company.com'],
            ['email' => 'email3@company.com'],
        ],
    ]);

    expect($settings->refresh()->emails)->toHaveCount(3);
});

test('can add multiple phone numbers', function () {
    $settings = SiteSetting::factory()->create([
        'mobile_numbers' => [
            ['phone' => '+1 (555) 111-1111'],
        ],
    ]);

    $settings->update([
        'mobile_numbers' => [
            ['phone' => '+1 (555) 111-1111'],
            ['phone' => '+1 (555) 222-2222'],
            ['phone' => '+1 (555) 333-3333'],
        ],
    ]);

    expect($settings->refresh()->mobile_numbers)->toHaveCount(3);
});

test('can handle empty emails array', function () {
    $settings = SiteSetting::create([
        'emails' => [],
        'mobile_numbers' => [],
    ]);

    expect($settings->emails)->toBeArray()->toBeEmpty();
});

test('can handle null repeater fields', function () {
    $settings = SiteSetting::create([
        'emails' => null,
        'mobile_numbers' => null,
    ]);

    expect($settings->emails)->toBeNull();
    expect($settings->mobile_numbers)->toBeNull();
});

test('site settings resource has correct navigation label', function () {
    expect(SiteSettingResource::getNavigationLabel())->toBe('Site Settings');
});

test('site settings resource has correct model label', function () {
    expect(SiteSettingResource::getModelLabel())->toBe('Site Setting');
});

test('site settings factory creates valid record', function () {
    $settings = SiteSetting::factory()->create();

    expect($settings)->not->toBeNull();
    expect($settings->emails)->toBeArray();
    expect($settings->mobile_numbers)->toBeArray();
});
