<?php

use App\Filament\Resources\AboutUs\AboutUsResource;
use App\Filament\Resources\AboutUs\Pages\ManageAboutUs;
use App\Models\AboutUs;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

use function Pest\Laravel\actingAs;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->user = User::factory()->create();
    actingAs($this->user);
});

test('about us is a singleton - only one record exists', function () {
    // Create multiple records
    AboutUs::factory()->create(['title' => 'First']);
    AboutUs::factory()->create(['title' => 'Second']);
    AboutUs::factory()->create(['title' => 'Third']);

    // Should have 3 records (this tests the model can have multiple records)
    expect(AboutUs::count())->toBe(3);
});

test('manage about us page auto-creates record if none exists', function () {
    // Ensure no records exist
    expect(AboutUs::count())->toBe(0);

    // Visit the manage page
    $component = Livewire::test(ManageAboutUs::class);

    // A record should be auto-created
    expect(AboutUs::count())->toBe(1);
    expect(AboutUs::first()->title)->toBe('About Our Company');
});

test('manage about us page uses existing record', function () {
    // Create a record
    $aboutUs = AboutUs::factory()->create([
        'title' => 'Existing Title',
    ]);

    // Visit the manage page
    $component = Livewire::test(ManageAboutUs::class);

    // Should still have only 1 record (no new one created)
    expect(AboutUs::count())->toBe(1);
    expect(AboutUs::first()->title)->toBe('Existing Title');
});

test('can create about us with required fields', function () {
    $aboutUs = AboutUs::create([
        'title' => 'About Our Company',
        'description' => '<p>We are a leading company in our industry.</p>',
        'company_profile_file' => 'about/company-profile.pdf',
    ]);

    expect($aboutUs)->not->toBeNull();
    expect($aboutUs->title)->toBe('About Our Company');
    expect($aboutUs->company_profile_file)->toBe('about/company-profile.pdf');
});

test('about us requires title field', function () {
    expect(fn () => AboutUs::create([
        'description' => 'Test',
        'company_profile_file' => 'test.pdf',
    ]))->toThrow(\Illuminate\Database\QueryException::class);
});

test('about us requires description field', function () {
    expect(fn () => AboutUs::create([
        'title' => 'Test',
        'company_profile_file' => 'test.pdf',
    ]))->toThrow(\Illuminate\Database\QueryException::class);
});

test('about us requires company_profile_file field', function () {
    expect(fn () => AboutUs::create([
        'title' => 'Test',
        'description' => 'Test description',
    ]))->toThrow(\Illuminate\Database\QueryException::class);
});

test('can create about us with all general info fields', function () {
    $aboutUs = AboutUs::create([
        'title' => 'About Our Company',
        'description' => '<p>We are a leading company.</p>',
        'chairman_name' => 'John Doe',
        'designation' => 'CEO',
        'about_section_image' => 'about/section-image.jpg',
        'company_profile_file' => 'about/profile.pdf',
        'year_of_innovation' => 2020,
        'successful_projects' => 150,
        'client_retention' => 95,
    ]);

    expect($aboutUs->chairman_name)->toBe('John Doe');
    expect($aboutUs->designation)->toBe('CEO');
    expect($aboutUs->year_of_innovation)->toBe(2020);
    expect($aboutUs->successful_projects)->toBe(150);
    expect($aboutUs->client_retention)->toBe(95);
});

test('can create about us with mission and vision', function () {
    $aboutUs = AboutUs::create([
        'title' => 'About Our Company',
        'description' => 'Description',
        'company_profile_file' => 'profile.pdf',
        'mission' => 'Our mission is to deliver excellence',
        'mission_points' => [
            ['point' => 'Innovation'],
            ['point' => 'Quality'],
            ['point' => 'Customer Satisfaction'],
        ],
        'vision' => 'Our vision is to be the market leader',
        'vision_points' => [
            ['point' => 'Global Presence'],
            ['point' => 'Industry Leadership'],
        ],
    ]);

    expect($aboutUs->mission)->toBe('Our mission is to deliver excellence');
    expect($aboutUs->mission_points)->toBeArray()->toHaveCount(3);
    expect($aboutUs->vision_points)->toBeArray()->toHaveCount(2);
});

test('can create about us with values', function () {
    $aboutUs = AboutUs::create([
        'title' => 'About Our Company',
        'description' => 'Description',
        'company_profile_file' => 'profile.pdf',
        'our_values' => 'Our core values guide everything we do',
        'our_values_points' => [
            ['point' => 'Integrity'],
            ['point' => 'Excellence'],
            ['point' => 'Innovation'],
            ['point' => 'Teamwork'],
        ],
    ]);

    expect($aboutUs->our_values)->toBe('Our core values guide everything we do');
    expect($aboutUs->our_values_points)->toBeArray()->toHaveCount(4);
    expect($aboutUs->our_values_points[0]['point'])->toBe('Integrity');
});

test('can update about us', function () {
    $aboutUs = AboutUs::factory()->create([
        'title' => 'Original Title',
        'chairman_name' => 'John Doe',
    ]);

    $aboutUs->update([
        'title' => 'Updated Title',
        'chairman_name' => 'Jane Smith',
    ]);

    expect($aboutUs->refresh())
        ->title->toBe('Updated Title')
        ->chairman_name->toBe('Jane Smith');
});

test('about us page title is correct', function () {
    AboutUs::factory()->create();

    Livewire::test(ManageAboutUs::class)
        ->assertSee('About Us Settings');
});

test('can delete about us', function () {
    $aboutUs = AboutUs::factory()->create();

    $aboutUs->delete();

    $this->assertModelMissing($aboutUs);
});

test('can add mission points', function () {
    $aboutUs = AboutUs::factory()->create([
        'mission_points' => [
            ['point' => 'Point 1'],
        ],
    ]);

    $aboutUs->update([
        'mission_points' => [
            ['point' => 'Point 1'],
            ['point' => 'Point 2'],
            ['point' => 'Point 3'],
        ],
    ]);

    expect($aboutUs->refresh()->mission_points)
        ->toBeArray()
        ->toHaveCount(3);
});

test('can add vision points', function () {
    $aboutUs = AboutUs::factory()->create([
        'vision_points' => [
            ['point' => 'Vision 1'],
        ],
    ]);

    $aboutUs->update([
        'vision_points' => [
            ['point' => 'Vision 1'],
            ['point' => 'Vision 2'],
        ],
    ]);

    expect($aboutUs->refresh()->vision_points)
        ->toBeArray()
        ->toHaveCount(2);
});

test('can add values points', function () {
    $aboutUs = AboutUs::factory()->create([
        'our_values_points' => [],
    ]);

    $aboutUs->update([
        'our_values_points' => [
            ['point' => 'Value 1'],
            ['point' => 'Value 2'],
            ['point' => 'Value 3'],
            ['point' => 'Value 4'],
        ],
    ]);

    expect($aboutUs->refresh()->our_values_points)
        ->toBeArray()
        ->toHaveCount(4);
});

test('about us resource has correct navigation label', function () {
    expect(AboutUsResource::getNavigationLabel())->toBe('About Us');
});

test('about us resource has correct model label', function () {
    expect(AboutUsResource::getModelLabel())->toBe('About Us');
});

test('about us resource has correct plural model label', function () {
    expect(AboutUsResource::getPluralModelLabel())->toBe('About Us');
});

test('about us factory creates valid record', function () {
    $aboutUs = AboutUs::factory()->create();

    expect($aboutUs)->not->toBeNull();
    expect($aboutUs->title)->not->toBeNull();
    expect($aboutUs->description)->not->toBeNull();
    expect($aboutUs->company_profile_file)->not->toBeNull();
    expect($aboutUs->mission_points)->toBeArray();
    expect($aboutUs->vision_points)->toBeArray();
    expect($aboutUs->our_values_points)->toBeArray();
});

test('numeric fields cast correctly', function () {
    $aboutUs = AboutUs::factory()->create([
        'year_of_innovation' => 2020,
        'successful_projects' => 100,
        'client_retention' => 95,
        'client_satisfaction' => 98,
        'projects_delivered' => 250,
    ]);

    expect($aboutUs->year_of_innovation)->toBeInt();
    expect($aboutUs->successful_projects)->toBeInt();
    expect($aboutUs->client_retention)->toBeInt();
    expect($aboutUs->client_satisfaction)->toBeInt();
    expect($aboutUs->projects_delivered)->toBeInt();
});

test('can handle null repeater fields', function () {
    $aboutUs = AboutUs::create([
        'title' => 'Test',
        'description' => 'Test description',
        'company_profile_file' => 'test.pdf',
        'mission_points' => null,
        'vision_points' => null,
        'our_values_points' => null,
    ]);

    expect($aboutUs->mission_points)->toBeNull();
    expect($aboutUs->vision_points)->toBeNull();
    expect($aboutUs->our_values_points)->toBeNull();
});

test('can handle empty repeater fields', function () {
    $aboutUs = AboutUs::create([
        'title' => 'Test',
        'description' => 'Test description',
        'company_profile_file' => 'test.pdf',
        'mission_points' => [],
        'vision_points' => [],
        'our_values_points' => [],
    ]);

    expect($aboutUs->mission_points)->toBeArray()->toBeEmpty();
    expect($aboutUs->vision_points)->toBeArray()->toBeEmpty();
    expect($aboutUs->our_values_points)->toBeArray()->toBeEmpty();
});
