<?php

use App\Models\Banner;
use Illuminate\Support\Facades\Cache;

it('clears banner cache when a banner is created', function () {
    // Pre-populate cache
    Cache::put('home.banners', collect([['id' => 999]]), 3600);

    expect(Cache::has('home.banners'))->toBeTrue();

    // Create a new banner
    Banner::factory()->create();

    // Cache should be cleared
    expect(Cache::has('home.banners'))->toBeFalse();
});

it('clears banner cache when a banner is updated', function () {
    $banner = Banner::factory()->create();

    // Populate cache
    Cache::put('home.banners', collect([$banner]), 3600);

    expect(Cache::has('home.banners'))->toBeTrue();

    // Update the banner
    $banner->update(['title' => 'Updated Title']);

    // Cache should be cleared
    expect(Cache::has('home.banners'))->toBeFalse();
});

it('clears banner cache when a banner is deleted', function () {
    $banner = Banner::factory()->create();

    // Populate cache
    Cache::put('home.banners', collect([$banner]), 3600);

    expect(Cache::has('home.banners'))->toBeTrue();

    // Delete the banner
    $banner->delete();

    // Cache should be cleared
    expect(Cache::has('home.banners'))->toBeFalse();
});

it('automatically refreshes home page banners after creating new banner', function () {
    // Create initial banner
    $oldBanner = Banner::factory()->create([
        'status' => true,
        'title' => 'Old Banner',
    ]);

    // Visit home page to populate cache
    $this->get('/')->assertSee('Old Banner');

    // Create a new banner
    $newBanner = Banner::factory()->create([
        'status' => true,
        'title' => 'New Banner',
    ]);

    // Visit home page again - should see new banner (cache was cleared)
    $response = $this->get('/');
    $response->assertSee('New Banner');
    $response->assertSee('Old Banner');
});
