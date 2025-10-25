<?php

use App\Filament\Resources\Services\ServiceResource;
use App\Models\Service;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\actingAs;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->user = User::factory()->create();
    actingAs($this->user);
});

test('can create service with all required fields', function () {
    $service = Service::create([
        'image' => 'services/carousel/test.jpg',
        'alt_text' => 'Test Service',
        'primary_label' => 'Primary',
        'secondary_label' => 'Secondary',
        'title' => 'Test Service Title',
        'title_hover' => 'Hover Title',
        'big_image' => 'services/detail/test-hero.jpg',
        'description' => '<p>Test description</p>',
        'process' => [
            ['title' => 'Step 1', 'description' => 'First step'],
            ['title' => 'Step 2', 'description' => 'Second step'],
        ],
        'outcomes' => [
            ['title' => 'Outcome 1', 'description' => 'First outcome'],
        ],
        'sort_order' => 1,
        'status' => 'Active',
        'meta_title' => 'Test Service Meta Title',
        'meta_description' => 'Test service meta description for SEO',
        'meta_keywords' => 'test, service, keywords',
        'og_image' => 'services/og/test-og.jpg',
    ]);

    expect($service)->not->toBeNull();
    expect($service->title)->toBe('Test Service Title');
    expect($service->status)->toBe('Active');
    expect($service->process)->toBeArray()->toHaveCount(2);
    expect($service->outcomes)->toBeArray()->toHaveCount(1);
    expect($service->meta_title)->toBe('Test Service Meta Title');
    expect($service->meta_description)->toBe('Test service meta description for SEO');
});

test('service requires image field', function () {
    expect(fn () => Service::create([
        'alt_text' => 'Test',
        'big_image' => 'test.jpg',
        'sort_order' => 1,
        'status' => 'Active',
    ]))->toThrow(\Illuminate\Database\QueryException::class);
});

test('service requires alt_text field', function () {
    expect(fn () => Service::create([
        'image' => 'test.jpg',
        'big_image' => 'test.jpg',
        'sort_order' => 1,
        'status' => 'Active',
    ]))->toThrow(\Illuminate\Database\QueryException::class);
});

test('service requires big_image field', function () {
    expect(fn () => Service::create([
        'image' => 'test.jpg',
        'alt_text' => 'Test',
        'sort_order' => 1,
        'status' => 'Active',
    ]))->toThrow(\Illuminate\Database\QueryException::class);
});

test('service requires sort_order field', function () {
    expect(fn () => Service::create([
        'image' => 'test.jpg',
        'alt_text' => 'Test',
        'big_image' => 'test.jpg',
        'status' => 'Active',
    ]))->toThrow(\Illuminate\Database\QueryException::class);
});

test('can update service', function () {
    $service = Service::factory()->create([
        'title' => 'Original Title',
        'status' => 'Active',
        'sort_order' => 1,
    ]);

    $service->update([
        'title' => 'Updated Service Title',
        'status' => 'Inactive',
        'sort_order' => 99,
    ]);

    expect($service->refresh())
        ->title->toBe('Updated Service Title')
        ->status->toBe('Inactive')
        ->sort_order->toBe(99);
});

test('can delete service', function () {
    $service = Service::factory()->create();

    $service->delete();

    $this->assertModelMissing($service);
});

test('can reorder services by updating sort_order', function () {
    $service1 = Service::factory()->create(['sort_order' => 1]);
    $service2 = Service::factory()->create(['sort_order' => 2]);
    $service3 = Service::factory()->create(['sort_order' => 3]);

    expect($service1->sort_order)->toBe(1);
    expect($service3->sort_order)->toBe(3);

    $service1->update(['sort_order' => 3]);
    $service2->update(['sort_order' => 1]);
    $service3->update(['sort_order' => 2]);

    expect($service1->refresh()->sort_order)->toBe(3);
    expect($service2->refresh()->sort_order)->toBe(1);
    expect($service3->refresh()->sort_order)->toBe(2);
});

test('can filter services by status', function () {
    Service::factory()->count(2)->create(['status' => 'Active']);
    Service::factory()->count(3)->create(['status' => 'Inactive']);

    $activeServices = Service::where('status', 'Active')->get();
    $inactiveServices = Service::where('status', 'Inactive')->get();

    expect($activeServices)->toHaveCount(2);
    expect($inactiveServices)->toHaveCount(3);
});

test('can order services by sort_order', function () {
    $service1 = Service::factory()->create(['sort_order' => 3, 'title' => 'Third']);
    $service2 = Service::factory()->create(['sort_order' => 1, 'title' => 'First']);
    $service3 = Service::factory()->create(['sort_order' => 2, 'title' => 'Second']);

    $ordered = Service::orderBy('sort_order')->get();

    expect($ordered->first()->title)->toBe('First');
    expect($ordered->last()->title)->toBe('Third');
});

test('service resource has correct navigation label', function () {
    expect(ServiceResource::getNavigationLabel())->toBe('Services');
});

test('service resource has correct model label', function () {
    expect(ServiceResource::getModelLabel())->toBe('Service');
});

test('service resource has correct plural model label', function () {
    expect(ServiceResource::getPluralModelLabel())->toBe('Services');
});

test('service factory creates valid service', function () {
    $service = Service::factory()->create();

    expect($service)->not->toBeNull();
    expect($service->image)->not->toBeNull();
    expect($service->alt_text)->not->toBeNull();
    expect($service->big_image)->not->toBeNull();
    expect($service->sort_order)->toBeInt();
    expect($service->status)->toBeIn(['Active', 'Inactive']);
});

test('can create service with process steps', function () {
    $service = Service::factory()->create([
        'process' => [
            ['title' => 'Discovery', 'description' => 'Understanding requirements'],
            ['title' => 'Planning', 'description' => 'Creating project roadmap'],
            ['title' => 'Execution', 'description' => 'Implementing the solution'],
        ],
    ]);

    expect($service->process)
        ->toBeArray()
        ->toHaveCount(3)
        ->and($service->process[0]['title'])->toBe('Discovery')
        ->and($service->process[1]['title'])->toBe('Planning')
        ->and($service->process[2]['title'])->toBe('Execution');
});

test('can create service with outcomes', function () {
    $service = Service::factory()->create([
        'outcomes' => [
            ['title' => 'Improved Efficiency', 'description' => '50% faster operations'],
            ['title' => 'Cost Reduction', 'description' => '30% savings'],
        ],
    ]);

    expect($service->outcomes)
        ->toBeArray()
        ->toHaveCount(2)
        ->and($service->outcomes[0]['title'])->toBe('Improved Efficiency')
        ->and($service->outcomes[1]['title'])->toBe('Cost Reduction');
});

test('can update service process and outcomes', function () {
    $service = Service::factory()->create([
        'process' => [['title' => 'Old Step', 'description' => 'Old description']],
        'outcomes' => [['title' => 'Old Outcome', 'description' => 'Old result']],
    ]);

    $service->update([
        'process' => [
            ['title' => 'New Step 1', 'description' => 'New description 1'],
            ['title' => 'New Step 2', 'description' => 'New description 2'],
        ],
        'outcomes' => [
            ['title' => 'New Outcome', 'description' => 'New result'],
        ],
    ]);

    expect($service->refresh())
        ->process->toHaveCount(2)
        ->outcomes->toHaveCount(1)
        ->and($service->process[0]['title'])->toBe('New Step 1')
        ->and($service->outcomes[0]['title'])->toBe('New Outcome');
});

test('can create service with empty process and outcomes', function () {
    $service = Service::factory()->create([
        'process' => [],
        'outcomes' => [],
    ]);

    expect($service->process)->toBeArray()->toBeEmpty();
    expect($service->outcomes)->toBeArray()->toBeEmpty();
});

test('can create service with null process and outcomes', function () {
    $service = Service::factory()->create([
        'process' => null,
        'outcomes' => null,
    ]);

    expect($service->process)->toBeNull();
    expect($service->outcomes)->toBeNull();
});

test('can create service with meta fields', function () {
    $service = Service::factory()->create([
        'meta_title' => 'SEO Optimized Title',
        'meta_description' => 'This is a detailed meta description for search engines.',
        'meta_keywords' => 'seo, keywords, service',
        'og_image' => 'services/og/social-image.jpg',
    ]);

    expect($service->meta_title)->toBe('SEO Optimized Title');
    expect($service->meta_description)->toBe('This is a detailed meta description for search engines.');
    expect($service->meta_keywords)->toBe('seo, keywords, service');
    expect($service->og_image)->toBe('services/og/social-image.jpg');
});

test('can update service meta fields', function () {
    $service = Service::factory()->create([
        'meta_title' => 'Old Meta Title',
        'meta_description' => 'Old meta description',
    ]);

    $service->update([
        'meta_title' => 'New Meta Title',
        'meta_description' => 'New meta description for better SEO',
        'meta_keywords' => 'new, keywords',
        'og_image' => 'services/og/new-image.jpg',
    ]);

    expect($service->refresh())
        ->meta_title->toBe('New Meta Title')
        ->meta_description->toBe('New meta description for better SEO')
        ->meta_keywords->toBe('new, keywords')
        ->og_image->toBe('services/og/new-image.jpg');
});

test('meta fields are optional', function () {
    $service = Service::factory()->create([
        'meta_title' => null,
        'meta_description' => null,
        'meta_keywords' => null,
        'og_image' => null,
    ]);

    expect($service->meta_title)->toBeNull();
    expect($service->meta_description)->toBeNull();
    expect($service->meta_keywords)->toBeNull();
    expect($service->og_image)->toBeNull();
});
