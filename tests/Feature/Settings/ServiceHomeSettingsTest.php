<?php

use App\Filament\Pages\ServiceHomeSettings;
use App\Models\ServiceHomeSetting;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

use function Pest\Laravel\actingAs;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->user = User::factory()->create();
    actingAs($this->user);
});

test('can render service home settings page', function () {
    Livewire::test(ServiceHomeSettings::class)
        ->assertSuccessful();
});

test('page automatically creates settings record on mount', function () {
    expect(ServiceHomeSetting::count())->toBe(0);

    Livewire::test(ServiceHomeSettings::class);

    expect(ServiceHomeSetting::count())->toBe(1);
});

test('title field is required', function () {
    Livewire::test(ServiceHomeSettings::class)
        ->fillForm([
            'title' => null,
            'heading' => 'Some Heading',
        ])
        ->call('save')
        ->assertHasFormErrors(['title' => 'required']);
});

test('heading field is required', function () {
    Livewire::test(ServiceHomeSettings::class)
        ->fillForm([
            'title' => 'Some Title',
            'heading' => null,
        ])
        ->call('save')
        ->assertHasFormErrors(['heading' => 'required']);
});

test('description field is optional', function () {
    ServiceHomeSetting::create([
        'title' => 'Test',
        'heading' => 'Test',
        'description' => null,
        'highlights' => [],
        'offerings' => [],
    ]);

    $setting = ServiceHomeSetting::first();
    expect($setting->description)->toBeNull();
});

test('highlights field is optional', function () {
    ServiceHomeSetting::create([
        'title' => 'Test',
        'heading' => 'Test',
        'description' => 'Test',
        'highlights' => [],
        'offerings' => [],
    ]);

    $setting = ServiceHomeSetting::first();
    expect($setting->highlights)->toBeArray()->toBeEmpty();
});

test('offerings field is optional', function () {
    ServiceHomeSetting::create([
        'title' => 'Test',
        'heading' => 'Test',
        'description' => 'Test',
        'highlights' => [],
        'offerings' => [],
    ]);

    $setting = ServiceHomeSetting::first();
    expect($setting->offerings)->toBeArray()->toBeEmpty();
});

test('can store multiple highlights', function () {
    ServiceHomeSetting::create([
        'title' => 'Test',
        'heading' => 'Test',
        'description' => 'Test',
        'highlights' => [
            ['highlight_item' => 'First Highlight'],
            ['highlight_item' => 'Second Highlight'],
            ['highlight_item' => 'Third Highlight'],
        ],
        'offerings' => [],
    ]);

    $setting = ServiceHomeSetting::first();
    expect($setting->highlights)->toHaveCount(3);
});

test('can store multiple offerings with number tags', function () {
    ServiceHomeSetting::create([
        'title' => 'Test',
        'heading' => 'Test',
        'description' => 'Test',
        'highlights' => [],
        'offerings' => [
            ['title' => 'Service 1', 'number_tag' => '01'],
            ['title' => 'Service 2', 'number_tag' => '02'],
            ['title' => 'Service 3', 'number_tag' => '03'],
        ],
    ]);

    $setting = ServiceHomeSetting::first();
    expect($setting->offerings)->toHaveCount(3);
    expect($setting->offerings[0]['number_tag'])->toBe('01');
    expect($setting->offerings[1]['number_tag'])->toBe('02');
});

test('page has correct navigation group', function () {
    expect(ServiceHomeSettings::getNavigationGroup())->toBe('Home Settings');
});

test('page has correct navigation label', function () {
    expect(ServiceHomeSettings::getNavigationLabel())->toBe('Service');
});
