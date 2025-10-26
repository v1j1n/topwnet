<?php

use App\Filament\Resources\ContactEnquiries\ContactEnquiryResource;
use App\Filament\Resources\ContactEnquiries\Pages\ListContactEnquiries;
use App\Filament\Resources\ContactEnquiries\Pages\ViewContactEnquiry;
use App\Models\ContactEnquiry;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->user = User::factory()->create();
    actingAs($this->user);
});

test('can render contact enquiries list page', function () {
    Livewire::test(ListContactEnquiries::class)
        ->assertSuccessful();
});

test('can list contact enquiries', function () {
    $enquiries = ContactEnquiry::factory()->count(5)->create();

    Livewire::test(ListContactEnquiries::class)
        ->assertCanSeeTableRecords($enquiries);
});

test('can search contact enquiries by name', function () {
    $enquiries = ContactEnquiry::factory()->count(3)->create();
    $searchEnquiry = $enquiries->first();

    Livewire::test(ListContactEnquiries::class)
        ->searchTable($searchEnquiry->name)
        ->assertCanSeeTableRecords([$searchEnquiry])
        ->assertCanNotSeeTableRecords($enquiries->skip(1));
});

test('can search contact enquiries by email', function () {
    $enquiries = ContactEnquiry::factory()->count(3)->create();
    $searchEnquiry = $enquiries->first();

    Livewire::test(ListContactEnquiries::class)
        ->searchTable($searchEnquiry->email)
        ->assertCanSeeTableRecords([$searchEnquiry])
        ->assertCanNotSeeTableRecords($enquiries->skip(1));
});

test('can search contact enquiries by phone', function () {
    $enquiries = ContactEnquiry::factory()->count(3)->create();
    $searchEnquiry = $enquiries->first();

    Livewire::test(ListContactEnquiries::class)
        ->searchTable($searchEnquiry->phone)
        ->assertCanSeeTableRecords([$searchEnquiry])
        ->assertCanNotSeeTableRecords($enquiries->skip(1));
});

test('can sort contact enquiries by name', function () {
    $enquiries = ContactEnquiry::factory()->count(3)->create([
        'name' => fn () => fake()->unique()->name(),
    ]);

    Livewire::test(ListContactEnquiries::class)
        ->sortTable('name')
        ->assertCanSeeTableRecords($enquiries->sortBy('name'), inOrder: true);
});

test('contact enquiries table is paginated', function () {
    ContactEnquiry::factory()->count(15)->create();

    $component = Livewire::test(ListContactEnquiries::class);

    expect($component->get('paginators'))->not->toBeEmpty();
});

test('can render view contact enquiry page', function () {
    $enquiry = ContactEnquiry::factory()->create();

    Livewire::test(ViewContactEnquiry::class, ['record' => $enquiry->id])
        ->assertSuccessful();
});

test('can view contact enquiry details', function () {
    $enquiry = ContactEnquiry::factory()->create([
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'phone' => '1234567890',
        'message' => 'This is a test message',
    ]);

    Livewire::test(ViewContactEnquiry::class, ['record' => $enquiry->id])
        ->assertSee('John Doe')
        ->assertSee('john@example.com')
        ->assertSee('1234567890')
        ->assertSee('This is a test message');
});

test('can delete contact enquiry from list page', function () {
    $enquiry = ContactEnquiry::factory()->create();

    Livewire::test(ListContactEnquiries::class)
        ->callTableAction('delete', $enquiry);

    assertDatabaseMissing(ContactEnquiry::class, [
        'id' => $enquiry->id,
    ]);
});

test('can delete contact enquiry from view page', function () {
    $enquiry = ContactEnquiry::factory()->create();

    Livewire::test(ViewContactEnquiry::class, ['record' => $enquiry->id])
        ->callAction('delete');

    assertDatabaseMissing(ContactEnquiry::class, [
        'id' => $enquiry->id,
    ]);
});

test('can bulk delete contact enquiries', function () {
    $enquiries = ContactEnquiry::factory()->count(3)->create();

    Livewire::test(ListContactEnquiries::class)
        ->callTableBulkAction('delete', $enquiries);

    foreach ($enquiries as $enquiry) {
        assertDatabaseMissing(ContactEnquiry::class, [
            'id' => $enquiry->id,
        ]);
    }
});

test('cannot create contact enquiry from admin panel', function () {
    expect(ContactEnquiryResource::canCreate())->toBeFalse();
});

test('create page does not exist', function () {
    expect(ContactEnquiryResource::getPages())->not->toHaveKey('create');
});

test('edit page does not exist', function () {
    expect(ContactEnquiryResource::getPages())->not->toHaveKey('edit');
});

test('contact enquiries table displays correct columns', function () {
    $enquiry = ContactEnquiry::factory()->create();

    Livewire::test(ListContactEnquiries::class)
        ->assertCanRenderTableColumn('name')
        ->assertCanRenderTableColumn('email')
        ->assertCanRenderTableColumn('phone')
        ->assertCanRenderTableColumn('message')
        ->assertCanRenderTableColumn('created_at');
});


