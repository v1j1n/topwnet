<?php

use App\Filament\Pages\AboutUsHomeSettings;
use App\Models\AboutUsHomeSetting;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;

use function Pest\Laravel\actingAs;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->user = User::factory()->create();
    actingAs($this->user);
    Storage::fake('public');
});

test('can render about us home settings page', function () {
    Livewire::test(AboutUsHomeSettings::class)
        ->assertSuccessful();
});

test('page automatically creates settings record on mount', function () {
    expect(AboutUsHomeSetting::count())->toBe(0);

    Livewire::test(AboutUsHomeSettings::class);

    expect(AboutUsHomeSetting::count())->toBe(1);

    $setting = AboutUsHomeSetting::first();
    expect($setting->status)->toBe('active');
});


test('title field is required', function () {
    Livewire::test(AboutUsHomeSettings::class)
        ->fillForm([
            'title' => null,
            'heading' => 'Some Heading',
        ])
        ->call('save')
        ->assertHasFormErrors(['title' => 'required']);
});

test('heading field is required', function () {
    Livewire::test(AboutUsHomeSettings::class)
        ->fillForm([
            'title' => 'Some Title',
            'heading' => null,
        ])
        ->call('save')
        ->assertHasFormErrors(['heading' => 'required']);
});


test('page has correct navigation group', function () {
    expect(AboutUsHomeSettings::getNavigationGroup())->toBe('Home Settings');
});

test('page has correct navigation label', function () {
    expect(AboutUsHomeSettings::getNavigationLabel())->toBe('About Us');
});
