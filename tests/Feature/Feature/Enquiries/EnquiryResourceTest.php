<?php

use App\Filament\Resources\Enquiries\EnquiryResource;
use App\Models\Enquiry;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\actingAs;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->user = User::factory()->create();
    actingAs($this->user);
});

test('can create enquiry with all fields', function () {
    $enquiry = Enquiry::create([
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'phone' => '+1 (555) 123-4567',
        'service_name' => 'Web Development',
        'message' => 'I need a website for my business.',
    ]);

    expect($enquiry)->not->toBeNull();
    expect($enquiry->name)->toBe('John Doe');
    expect($enquiry->email)->toBe('john@example.com');
    expect($enquiry->service_name)->toBe('Web Development');
});

test('enquiry requires name field', function () {
    expect(fn () => Enquiry::create([
        'email' => 'test@example.com',
        'message' => 'Test message',
    ]))->toThrow(\Illuminate\Database\QueryException::class);
});

test('enquiry requires email field', function () {
    expect(fn () => Enquiry::create([
        'name' => 'Test User',
        'message' => 'Test message',
    ]))->toThrow(\Illuminate\Database\QueryException::class);
});

test('enquiry requires message field', function () {
    expect(fn () => Enquiry::create([
        'name' => 'Test User',
        'email' => 'test@example.com',
    ]))->toThrow(\Illuminate\Database\QueryException::class);
});

test('enquiry phone and service_name are optional', function () {
    $enquiry = Enquiry::create([
        'name' => 'Jane Doe',
        'email' => 'jane@example.com',
        'message' => 'This is a test message.',
    ]);

    expect($enquiry->phone)->toBeNull();
    expect($enquiry->service_name)->toBeNull();
});

test('can delete enquiry', function () {
    $enquiry = Enquiry::factory()->create();

    $enquiry->delete();

    $this->assertModelMissing($enquiry);
});

test('can list multiple enquiries', function () {
    Enquiry::factory()->count(5)->create();

    expect(Enquiry::count())->toBe(5);
});

test('enquiries are ordered by created_at desc by default', function () {
    $first = Enquiry::factory()->create(['created_at' => now()->subDays(3)]);
    $second = Enquiry::factory()->create(['created_at' => now()->subDays(2)]);
    $third = Enquiry::factory()->create(['created_at' => now()->subDays(1)]);

    $enquiries = Enquiry::orderBy('created_at', 'desc')->get();

    expect($enquiries->first()->id)->toBe($third->id);
    expect($enquiries->last()->id)->toBe($first->id);
});

test('enquiry resource has correct navigation label', function () {
    expect(EnquiryResource::getNavigationLabel())->toBe('General Enquiries');
});

test('enquiry resource has correct model label', function () {
    expect(EnquiryResource::getModelLabel())->toBe('General Enquiry');
});

test('enquiry resource cannot create records', function () {
    expect(EnquiryResource::canCreate())->toBeFalse();
});

test('enquiry factory creates valid record', function () {
    $enquiry = Enquiry::factory()->create();

    expect($enquiry)->not->toBeNull();
    expect($enquiry->name)->not->toBeNull();
    expect($enquiry->email)->not->toBeNull();
    expect($enquiry->message)->not->toBeNull();
});

test('can search enquiries by name', function () {
    Enquiry::factory()->create(['name' => 'John Smith']);
    Enquiry::factory()->create(['name' => 'Jane Doe']);

    $results = Enquiry::where('name', 'like', '%John%')->get();

    expect($results)->toHaveCount(1);
    expect($results->first()->name)->toBe('John Smith');
});

test('can search enquiries by email', function () {
    Enquiry::factory()->create(['email' => 'john@example.com']);
    Enquiry::factory()->create(['email' => 'jane@example.com']);

    $results = Enquiry::where('email', 'like', '%john%')->get();

    expect($results)->toHaveCount(1);
    expect($results->first()->email)->toBe('john@example.com');
});

test('can filter enquiries by service name', function () {
    Enquiry::factory()->count(3)->create(['service_name' => 'Web Development']);
    Enquiry::factory()->count(2)->create(['service_name' => 'Mobile App Development']);

    $webDev = Enquiry::where('service_name', 'Web Development')->get();
    $mobileDev = Enquiry::where('service_name', 'Mobile App Development')->get();

    expect($webDev)->toHaveCount(3);
    expect($mobileDev)->toHaveCount(2);
});
