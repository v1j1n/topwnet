<?php

use App\Filament\Resources\Partners\PartnerResource;
use App\Models\Partner;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\actingAs;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->user = User::factory()->create();
    actingAs($this->user);
});

test('can create partner with all required fields', function () {
    $partner = Partner::create([
        'name' => 'Test Partner Company',
        'slug' => 'test-partner-company',
        'logo' => 'partners/test-logo.png',
        'short_description' => 'This is a test partner company description.',
        'sort_order' => 1,
        'status' => 'Active',
    ]);

    expect($partner)->not->toBeNull();
    expect($partner->name)->toBe('Test Partner Company');
    expect($partner->slug)->toBe('test-partner-company');
    expect($partner->status)->toBe('Active');
});

test('partner auto-generates slug from name', function () {
    $partner = Partner::create([
        'name' => 'Test Partner Inc',
        'logo' => 'partners/test.png',
        'short_description' => 'Test description',
        'sort_order' => 1,
        'status' => 'Active',
    ]);

    expect($partner->slug)->toBe('test-partner-inc');
});

test('partner requires name field', function () {
    expect(fn () => Partner::create([
        'slug' => 'test',
        'logo' => 'test.png',
        'short_description' => 'Test',
        'sort_order' => 1,
        'status' => 'Active',
    ]))->toThrow(\Illuminate\Database\QueryException::class);
});

test('partner requires logo field', function () {
    expect(fn () => Partner::create([
        'name' => 'Test',
        'slug' => 'test',
        'short_description' => 'Test',
        'sort_order' => 1,
        'status' => 'Active',
    ]))->toThrow(\Illuminate\Database\QueryException::class);
});

test('partner requires short_description field', function () {
    expect(fn () => Partner::create([
        'name' => 'Test',
        'slug' => 'test',
        'logo' => 'test.png',
        'sort_order' => 1,
        'status' => 'Active',
    ]))->toThrow(\Illuminate\Database\QueryException::class);
});

test('can update partner', function () {
    $partner = Partner::factory()->create([
        'name' => 'Original Partner',
        'status' => 'Active',
        'sort_order' => 1,
    ]);

    $partner->update([
        'name' => 'Updated Partner Name',
        'status' => 'Inactive',
        'sort_order' => 99,
    ]);

    expect($partner->refresh())
        ->name->toBe('Updated Partner Name')
        ->status->toBe('Inactive')
        ->sort_order->toBe(99);
});

test('can delete partner', function () {
    $partner = Partner::factory()->create();

    $partner->delete();

    $this->assertModelMissing($partner);
});

test('can reorder partners by updating sort_order', function () {
    $partner1 = Partner::factory()->create(['sort_order' => 1, 'name' => 'First']);
    $partner2 = Partner::factory()->create(['sort_order' => 2, 'name' => 'Second']);
    $partner3 = Partner::factory()->create(['sort_order' => 3, 'name' => 'Third']);

    expect($partner1->sort_order)->toBe(1);
    expect($partner3->sort_order)->toBe(3);

    $partner1->update(['sort_order' => 3]);
    $partner2->update(['sort_order' => 1]);
    $partner3->update(['sort_order' => 2]);

    expect($partner1->refresh()->sort_order)->toBe(3);
    expect($partner2->refresh()->sort_order)->toBe(1);
    expect($partner3->refresh()->sort_order)->toBe(2);
});

test('can filter partners by status', function () {
    Partner::factory()->count(3)->create(['status' => 'Active']);
    Partner::factory()->count(2)->create(['status' => 'Inactive']);

    $activePartners = Partner::where('status', 'Active')->get();
    $inactivePartners = Partner::where('status', 'Inactive')->get();

    expect($activePartners)->toHaveCount(3);
    expect($inactivePartners)->toHaveCount(2);
});

test('can order partners by sort_order', function () {
    $partner1 = Partner::factory()->create(['sort_order' => 3, 'name' => 'Third']);
    $partner2 = Partner::factory()->create(['sort_order' => 1, 'name' => 'First']);
    $partner3 = Partner::factory()->create(['sort_order' => 2, 'name' => 'Second']);

    $ordered = Partner::orderBy('sort_order')->get();

    expect($ordered->first()->name)->toBe('First');
    expect($ordered->last()->name)->toBe('Third');
});

test('slug must be unique', function () {
    Partner::factory()->create(['slug' => 'unique-partner']);

    expect(fn () => Partner::create([
        'name' => 'Another Partner',
        'slug' => 'unique-partner',
        'logo' => 'partners/test.png',
        'short_description' => 'Test description',
        'sort_order' => 1,
        'status' => 'Active',
    ]))->toThrow(\Illuminate\Database\QueryException::class);
});

test('partner resource has correct navigation label', function () {
    expect(PartnerResource::getNavigationLabel())->toBe('Partners');
});

test('partner resource has correct model label', function () {
    expect(PartnerResource::getModelLabel())->toBe('Partner');
});

test('partner resource has correct plural model label', function () {
    expect(PartnerResource::getPluralModelLabel())->toBe('Partners');
});

test('partner factory creates valid partner', function () {
    $partner = Partner::factory()->create();

    expect($partner)->not->toBeNull();
    expect($partner->name)->not->toBeNull();
    expect($partner->slug)->not->toBeNull();
    expect($partner->logo)->not->toBeNull();
    expect($partner->short_description)->not->toBeNull();
    expect($partner->sort_order)->toBeInt();
    expect($partner->status)->toBeIn(['Active', 'Inactive']);
});

test('can get only active partners', function () {
    Partner::factory()->count(5)->create(['status' => 'Active']);
    Partner::factory()->count(3)->create(['status' => 'Inactive']);

    $activePartners = Partner::where('status', 'Active')->get();

    expect($activePartners)->toHaveCount(5);
    $activePartners->each(fn ($partner) => expect($partner->status)->toBe('Active'));
});

test('partners are sorted by sort_order by default', function () {
    Partner::factory()->create(['sort_order' => 5, 'name' => 'E']);
    Partner::factory()->create(['sort_order' => 2, 'name' => 'B']);
    Partner::factory()->create(['sort_order' => 1, 'name' => 'A']);
    Partner::factory()->create(['sort_order' => 3, 'name' => 'C']);

    $partners = Partner::orderBy('sort_order')->get();

    expect($partners->first()->name)->toBe('A');
    expect($partners->last()->name)->toBe('E');
});
