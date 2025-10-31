<?php

use App\Models\Enquiry;
use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;

uses(RefreshDatabase::class);

test('quote page loads successfully', function () {
    $response = $this->get(route('quote'));

    $response->assertSuccessful();
    $response->assertViewIs('pages.quote');
    $response->assertSee('Get a Quote');
    $response->assertSee('Need Help For Project!');
});

test('quote page displays dynamic contact information from site settings', function () {
    $response = $this->get(route('quote'));

    $response->assertSuccessful();
    $response->assertSee('Call For Inquiry');
    $response->assertSee('Send Us Email');
});

test('quote page displays services dropdown', function () {
    Service::factory()->create(['title' => 'IT Consulting']);
    Service::factory()->create(['title' => 'Network Security']);

    $response = $this->get(route('quote'));

    $response->assertSuccessful();
    $response->assertSee('IT Consulting');
    $response->assertSee('Network Security');
});

test('quote form displays fallback services when no services in database', function () {
    $response = $this->get(route('quote'));

    $response->assertSuccessful();
    $response->assertSee('IT Consulting');
    $response->assertSee('Network Security');
    $response->assertSee('IT Outsourcing');
});

test('quote form submits successfully with valid data', function () {
    Notification::fake();

    $data = [
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'phone' => '+96512345678',
        'service_name' => 'IT Consulting',
        'message' => 'I would like to get a quote for IT consulting services.',
    ];

    $response = $this->withoutMiddleware([
        \Illuminate\Foundation\Http\Middleware\ValidateCsrfToken::class,
        \Spatie\Honeypot\ProtectAgainstSpam::class,
    ])->postJson(route('enquiry.store'), $data);

    $response->assertSuccessful();
    $response->assertJson([
        'success' => true,
        'message' => 'Thank you for your enquiry! We will get back to you soon.',
    ]);

    $this->assertDatabaseHas('enquiries', [
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'phone' => '+96512345678',
        'service_name' => 'IT Consulting',
    ]);
});

test('quote form validates required name field', function () {
    $data = [
        'email' => 'john@example.com',
        'phone' => '+96512345678',
        'service_name' => 'IT Consulting',
        'message' => 'Test message',
    ];

    $response = $this->withoutMiddleware([
        \Illuminate\Foundation\Http\Middleware\ValidateCsrfToken::class,
        \Spatie\Honeypot\ProtectAgainstSpam::class,
    ])->postJson(route('enquiry.store'), $data);

    $response->assertStatus(422);
    $response->assertJsonValidationErrors(['name']);
});

test('quote form validates required email field', function () {
    $data = [
        'name' => 'John Doe',
        'phone' => '+96512345678',
        'service_name' => 'IT Consulting',
        'message' => 'Test message',
    ];

    $response = $this->withoutMiddleware([
        \Illuminate\Foundation\Http\Middleware\ValidateCsrfToken::class,
        \Spatie\Honeypot\ProtectAgainstSpam::class,
    ])->postJson(route('enquiry.store'), $data);

    $response->assertStatus(422);
    $response->assertJsonValidationErrors(['email']);
});

test('quote form validates email format', function () {
    $data = [
        'name' => 'John Doe',
        'email' => 'invalid-email',
        'phone' => '+96512345678',
        'service_name' => 'IT Consulting',
        'message' => 'Test message',
    ];

    $response = $this->withoutMiddleware([
        \Illuminate\Foundation\Http\Middleware\ValidateCsrfToken::class,
        \Spatie\Honeypot\ProtectAgainstSpam::class,
    ])->postJson(route('enquiry.store'), $data);

    $response->assertStatus(422);
    $response->assertJsonValidationErrors(['email']);
});

test('quote form validates required phone field', function () {
    $data = [
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'service_name' => 'IT Consulting',
        'message' => 'Test message',
    ];

    $response = $this->withoutMiddleware([
        \Illuminate\Foundation\Http\Middleware\ValidateCsrfToken::class,
        \Spatie\Honeypot\ProtectAgainstSpam::class,
    ])->postJson(route('enquiry.store'), $data);

    $response->assertStatus(422);
    $response->assertJsonValidationErrors(['phone']);
});

test('quote form validates required service field', function () {
    $data = [
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'phone' => '+96512345678',
        'message' => 'Test message',
    ];

    $response = $this->withoutMiddleware([
        \Illuminate\Foundation\Http\Middleware\ValidateCsrfToken::class,
        \Spatie\Honeypot\ProtectAgainstSpam::class,
    ])->postJson(route('enquiry.store'), $data);

    $response->assertStatus(422);
    $response->assertJsonValidationErrors(['service_name']);
});

test('quote form validates required message field', function () {
    $data = [
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'phone' => '+96512345678',
        'service_name' => 'IT Consulting',
    ];

    $response = $this->withoutMiddleware([
        \Illuminate\Foundation\Http\Middleware\ValidateCsrfToken::class,
        \Spatie\Honeypot\ProtectAgainstSpam::class,
    ])->postJson(route('enquiry.store'), $data);

    $response->assertStatus(422);
    $response->assertJsonValidationErrors(['message']);
});

test('quote form stores enquiry in database with all fields', function () {
    $data = [
        'name' => 'Jane Smith',
        'email' => 'jane@example.com',
        'phone' => '+96587654321',
        'service_name' => 'Network Security',
        'message' => 'Need help with network security implementation.',
    ];

    $this->withoutMiddleware([
        \Illuminate\Foundation\Http\Middleware\ValidateCsrfToken::class,
        \Spatie\Honeypot\ProtectAgainstSpam::class,
    ])->postJson(route('enquiry.store'), $data);

    $enquiry = Enquiry::where('email', 'jane@example.com')->first();

    expect($enquiry)->not->toBeNull();
    expect($enquiry->name)->toBe('Jane Smith');
    expect($enquiry->email)->toBe('jane@example.com');
    expect($enquiry->phone)->toBe('+96587654321');
    expect($enquiry->service_name)->toBe('Network Security');
    expect($enquiry->message)->toBe('Need help with network security implementation.');
});

test('quote form works with different service types', function () {
    $services = [
        'IT Consulting',
        'Network Security',
        'IT Outsourcing',
        'Hardware & Software',
        'AMC',
        'Web Development',
    ];

    foreach ($services as $service) {
        $data = [
            'name' => 'Test User',
            'email' => fake()->email(),
            'phone' => '+96512345678',
            'service_name' => $service,
            'message' => "I need help with {$service}",
        ];

        $response = $this->withoutMiddleware([
            \Illuminate\Foundation\Http\Middleware\ValidateCsrfToken::class,
            \Spatie\Honeypot\ProtectAgainstSpam::class,
        ])->postJson(route('enquiry.store'), $data);

        $response->assertSuccessful();
        $this->assertDatabaseHas('enquiries', [
            'service_name' => $service,
        ]);
    }
});

test('quote form sends notification to admin', function () {
    Notification::fake();

    $data = [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'phone' => '+96512345678',
        'service_name' => 'IT Consulting',
        'message' => 'Test message',
    ];

    $this->withoutMiddleware([
        \Illuminate\Foundation\Http\Middleware\ValidateCsrfToken::class,
        \Spatie\Honeypot\ProtectAgainstSpam::class,
    ])->postJson(route('enquiry.store'), $data);

    Notification::assertSentOnDemand(\App\Notifications\EnquiryReceived::class);
});

test('quote form returns json response for ajax requests', function () {
    $data = [
        'name' => 'AJAX User',
        'email' => 'ajax@example.com',
        'phone' => '+96512345678',
        'service_name' => 'IT Consulting',
        'message' => 'AJAX test message',
    ];

    $response = $this->withoutMiddleware([
        \Illuminate\Foundation\Http\Middleware\ValidateCsrfToken::class,
        \Spatie\Honeypot\ProtectAgainstSpam::class,
    ])->postJson(route('enquiry.store'), $data);

    $response->assertSuccessful();
    $response->assertJsonStructure([
        'success',
        'message',
    ]);
});

test('quote page includes necessary form attributes', function () {
    $response = $this->get(route('quote'));

    $response->assertSuccessful();
    $response->assertSee('quote_form', false);
    $response->assertSee('action="'.route('enquiry.store').'"', false);
    $response->assertSee('method="POST"', false);
});

test('multiple quote submissions create separate enquiry records', function () {
    $submissions = [
        [
            'name' => 'User One',
            'email' => 'user1@example.com',
            'phone' => '+96511111111',
            'service_name' => 'IT Consulting',
            'message' => 'First enquiry',
        ],
        [
            'name' => 'User Two',
            'email' => 'user2@example.com',
            'phone' => '+96522222222',
            'service_name' => 'Network Security',
            'message' => 'Second enquiry',
        ],
    ];

    foreach ($submissions as $data) {
        $this->withoutMiddleware([
            \Illuminate\Foundation\Http\Middleware\ValidateCsrfToken::class,
            \Spatie\Honeypot\ProtectAgainstSpam::class,
        ])->postJson(route('enquiry.store'), $data);
    }

    expect(Enquiry::count())->toBe(2);
    $this->assertDatabaseHas('enquiries', ['email' => 'user1@example.com']);
    $this->assertDatabaseHas('enquiries', ['email' => 'user2@example.com']);
});
