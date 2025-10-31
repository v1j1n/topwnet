<?php

use App\Models\AboutUsHomeSetting;
use App\Models\Banner;
use App\Models\Partner;
use App\Models\Service;
use App\Models\ServiceHomeSetting;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Cache;

// Banner Cache Tests
it('clears banner cache when a banner is created', function () {
    Cache::put('home.banners', collect([['id' => 999]]), 3600);
    expect(Cache::has('home.banners'))->toBeTrue();

    Banner::factory()->create();

    expect(Cache::has('home.banners'))->toBeFalse();
});

it('clears banner cache when a banner is updated', function () {
    $banner = Banner::factory()->create();
    Cache::put('home.banners', collect([$banner]), 3600);
    expect(Cache::has('home.banners'))->toBeTrue();

    $banner->update(['title' => 'Updated Title']);

    expect(Cache::has('home.banners'))->toBeFalse();
});

it('clears banner cache when a banner is deleted', function () {
    $banner = Banner::factory()->create();
    Cache::put('home.banners', collect([$banner]), 3600);
    expect(Cache::has('home.banners'))->toBeTrue();

    $banner->delete();

    expect(Cache::has('home.banners'))->toBeFalse();
});

// Service Cache Tests
it('clears service caches when a service is created', function () {
    Cache::put('active_services', collect([]), 3600);
    Cache::put('home.services', collect([]), 3600);

    expect(Cache::has('active_services'))->toBeTrue();
    expect(Cache::has('home.services'))->toBeTrue();

    Service::create([
        'image' => 'services/test.jpg',
        'alt_text' => 'Test Service',
        'primary_label' => 'Primary',
        'secondary_label' => 'Secondary',
        'title' => 'Test Service',
        'title_hover' => 'Hover Title',
        'big_image' => 'services/test-big.jpg',
        'description' => 'Test description',
        'sort_order' => 1,
        'status' => 'active',
        'slug' => 'test-service',
    ]);

    expect(Cache::has('active_services'))->toBeFalse();
    expect(Cache::has('home.services'))->toBeFalse();
});

it('clears service caches when a service is updated', function () {
    $service = Service::factory()->create();
    Cache::put('active_services', collect([$service]), 3600);
    Cache::put('home.services', collect([$service]), 3600);

    expect(Cache::has('active_services'))->toBeTrue();
    expect(Cache::has('home.services'))->toBeTrue();

    $service->update(['title' => 'Updated Service']);

    expect(Cache::has('active_services'))->toBeFalse();
    expect(Cache::has('home.services'))->toBeFalse();
});

it('clears service caches when a service is deleted', function () {
    $service = Service::factory()->create();
    Cache::put('active_services', collect([$service]), 3600);
    Cache::put('home.services', collect([$service]), 3600);

    expect(Cache::has('active_services'))->toBeTrue();
    expect(Cache::has('home.services'))->toBeTrue();

    $service->delete();

    expect(Cache::has('active_services'))->toBeFalse();
    expect(Cache::has('home.services'))->toBeFalse();
});

// Partner Cache Tests
it('clears partner cache when a partner is created', function () {
    Cache::put('home.partners', collect([]), 3600);
    expect(Cache::has('home.partners'))->toBeTrue();

    Partner::factory()->create();

    expect(Cache::has('home.partners'))->toBeFalse();
});

it('clears partner cache when a partner is updated', function () {
    $partner = Partner::factory()->create();
    Cache::put('home.partners', collect([$partner]), 3600);
    expect(Cache::has('home.partners'))->toBeTrue();

    $partner->update(['name' => 'Updated Partner']);

    expect(Cache::has('home.partners'))->toBeFalse();
});

it('clears partner cache when a partner is deleted', function () {
    $partner = Partner::factory()->create();
    Cache::put('home.partners', collect([$partner]), 3600);
    expect(Cache::has('home.partners'))->toBeTrue();

    $partner->delete();

    expect(Cache::has('home.partners'))->toBeFalse();
});

// SiteSetting Cache Tests (Singleton - Update Only)
it('clears site settings cache when site settings are updated', function () {
    $settings = SiteSetting::first() ?? SiteSetting::create([
        'emails' => ['test@example.com'],
        'mobile_numbers' => ['1234567890'],
    ]);

    Cache::put('site_settings', $settings, 3600);
    Cache::put('active_services', collect([]), 3600);

    expect(Cache::has('site_settings'))->toBeTrue();
    expect(Cache::has('active_services'))->toBeTrue();

    $settings->update(['emails' => ['updated@example.com']]);

    expect(Cache::has('site_settings'))->toBeFalse();
    expect(Cache::has('active_services'))->toBeFalse();
});

// AboutUsHomeSetting Cache Tests (Singleton - Update Only)
it('clears about us cache when about us settings are updated', function () {
    $settings = AboutUsHomeSetting::first() ?? AboutUsHomeSetting::create([
        'title' => 'About Us',
        'heading' => 'Our Story',
        'description' => 'Test description',
        'points' => [],
        'status' => 'active',
    ]);

    Cache::put('home.about_us', $settings, 3600);
    expect(Cache::has('home.about_us'))->toBeTrue();

    $settings->update(['title' => 'Updated About Us']);

    expect(Cache::has('home.about_us'))->toBeFalse();
});

// ServiceHomeSetting Cache Tests (Singleton - Update Only)
it('clears service home settings cache when service home settings are updated', function () {
    $settings = ServiceHomeSetting::first() ?? ServiceHomeSetting::create([
        'title' => 'Our Services',
        'heading' => 'What We Offer',
        'description' => 'Test description',
        'highlights' => [],
        'offerings' => [],
    ]);

    Cache::put('home.service_settings', $settings, 3600);
    expect(Cache::has('home.service_settings'))->toBeTrue();

    $settings->update(['title' => 'Updated Services']);

    expect(Cache::has('home.service_settings'))->toBeFalse();
});
