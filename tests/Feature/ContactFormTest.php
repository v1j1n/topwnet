<?php

use App\Models\ContactEnquiry;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;

uses(RefreshDatabase::class);

test('contact page loads successfully', function () {
    $response = $this->get(route('contact'));

    $response->assertSuccessful();
    $response->assertViewIs('pages.contact');
    $response->assertSee('Contact Us');
});

test('contact form creates enquiry with valid data', function () {
    Notification::fake();

    $data = [
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'phone' => '+96512345678',
        'subject' => 'IT Consulting Inquiry',
        'message' => 'I would like to know more about your IT consulting services.',
    ];

    ContactEnquiry::create($data);

    $this->assertDatabaseHas('contact_enquiries', [
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'phone' => '+96512345678',
        'subject' => 'IT Consulting Inquiry',
    ]);
});

test('contact form works without subject field', function () {
    $data = [
        'name' => 'Jane Doe',
        'email' => 'jane@example.com',
        'phone' => '+96587654321',
        'message' => 'General inquiry about your services.',
    ];

    ContactEnquiry::create($data);

    $this->assertDatabaseHas('contact_enquiries', [
        'name' => 'Jane Doe',
        'email' => 'jane@example.com',
        'subject' => null,
    ]);
});
