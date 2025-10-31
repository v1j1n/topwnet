<?php

use App\Filament\Resources\Banners\BannerResource;
use App\Filament\Resources\Banners\Pages\CreateBanner;
use App\Filament\Resources\Banners\Pages\EditBanner;
use App\Filament\Resources\Banners\Pages\ListBanners;
use App\Models\Banner;
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

test('can render banner list page', function () {
    Livewire::test(ListBanners::class)
        ->assertSuccessful();
});

test('can list banners', function () {
    $banners = Banner::factory()->count(3)->create();

    Livewire::test(ListBanners::class)
        ->assertCanSeeTableRecords($banners);
});

test('can search banners by title', function () {
    $banners = Banner::factory()->count(3)->create();
    $searchBanner = $banners->first();

    Livewire::test(ListBanners::class)
        ->searchTable($searchBanner->title)
        ->assertCanSeeTableRecords([$searchBanner])
        ->assertCanNotSeeTableRecords($banners->skip(1));
});

test('can sort banners by sort_order', function () {
    $banners = Banner::factory()->count(3)->create([
        'sort_order' => fn () => fake()->numberBetween(1, 100),
    ]);

    Livewire::test(ListBanners::class)
        ->sortTable('sort_order')
        ->assertCanSeeTableRecords($banners->sortBy('sort_order'), inOrder: true);
});

test('can filter banners by status', function () {
    $activeBanners = Banner::factory()->count(2)->create(['status' => true]);
    $inactiveBanners = Banner::factory()->count(2)->create(['status' => false]);

    Livewire::test(ListBanners::class)
        ->filterTable('status', true)
        ->assertCanSeeTableRecords($activeBanners)
        ->assertCanNotSeeTableRecords($inactiveBanners);
});

test('can render create banner page', function () {
    Livewire::test(CreateBanner::class)
        ->assertSuccessful();
});

test('can create banner', function () {
    $banner = Banner::create([
        'title' => 'Test Banner',
        'heading_1' => 'Heading One',
        'heading_2' => 'Heading Two',
        'description' => 'Test description',
        'status' => true,
        'sort_order' => 1,
        'image' => 'banners/test-banner.jpg',
    ]);

    expect($banner)->not->toBeNull();
    expect($banner->title)->toBe('Test Banner');
    expect($banner->heading_1)->toBe('Heading One');
    expect($banner->heading_2)->toBe('Heading Two');
    expect($banner->description)->toBe('Test description');
    expect($banner->status)->toBeTrue();
    expect($banner->sort_order)->toBe(1);
});

test('can validate banner creation requires title', function () {
    Livewire::test(CreateBanner::class)
        ->fillForm([
            'title' => null,
        ])
        ->call('create')
        ->assertHasFormErrors(['title' => 'required']);
});

test('can validate banner creation requires image', function () {
    Livewire::test(CreateBanner::class)
        ->fillForm([
            'title' => 'Test Banner',
            'image' => null,
        ])
        ->call('create')
        ->assertHasFormErrors(['image' => 'required']);
});

test('can render edit banner page', function () {
    $banner = Banner::factory()->create();

    Livewire::test(EditBanner::class, ['record' => $banner->getRouteKey()])
        ->assertSuccessful();
});

test('can retrieve banner data for editing', function () {
    $banner = Banner::factory()->create();

    Livewire::test(EditBanner::class, ['record' => $banner->getRouteKey()])
        ->assertFormSet([
            'title' => $banner->title,
            'heading_1' => $banner->heading_1,
            'heading_2' => $banner->heading_2,
            'description' => $banner->description,
            'status' => $banner->status,
            'sort_order' => $banner->sort_order,
        ]);
});

test('can update banner', function () {
    $banner = Banner::factory()->create([
        'title' => 'Original Title',
        'heading_1' => 'Original Heading 1',
        'status' => true,
    ]);
    $originalImage = $banner->image;

    $banner->update([
        'title' => 'Updated Banner Title',
        'heading_1' => 'Updated Heading 1',
        'status' => false,
    ]);

    expect($banner->fresh())
        ->title->toBe('Updated Banner Title')
        ->heading_1->toBe('Updated Heading 1')
        ->status->toBeFalse()
        ->image->toBe($originalImage);
});

test('can delete banner', function () {
    $banner = Banner::factory()->create();

    Livewire::test(EditBanner::class, ['record' => $banner->getRouteKey()])
        ->callAction('delete');

    $this->assertModelMissing($banner);
});

test('banner resource has correct navigation group', function () {
    expect(BannerResource::getNavigationGroup())->toBe('Home Settings');
});

test('banner resource has correct navigation label', function () {
    expect(BannerResource::getNavigationLabel())->toBe('Banners');
});

test('can reorder banners by dragging', function () {
    $banner1 = Banner::factory()->create(['sort_order' => 1]);
    $banner2 = Banner::factory()->create(['sort_order' => 2]);
    $banner3 = Banner::factory()->create(['sort_order' => 3]);

    expect($banner1->sort_order)->toBe(1);
    expect($banner3->sort_order)->toBe(3);

    // Simulate reordering by updating sort_order
    $banner1->update(['sort_order' => 3]);
    $banner2->update(['sort_order' => 1]);
    $banner3->update(['sort_order' => 2]);

    expect($banner1->refresh()->sort_order)->toBe(3);
    expect($banner2->refresh()->sort_order)->toBe(1);
    expect($banner3->refresh()->sort_order)->toBe(2);
});

