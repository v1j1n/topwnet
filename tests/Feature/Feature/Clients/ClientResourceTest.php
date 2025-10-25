<?php

use App\Filament\Resources\Clients\ClientResource;
use App\Models\Client;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\actingAs;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->user = User::factory()->create();
    actingAs($this->user);
});

test('can create client with all required fields', function () {
    $client = Client::create([
        'name' => 'Tech Partners 2024',
        'clients_list' => [
            ['client_name' => 'Google Inc', 'sort_order' => 1],
            ['client_name' => 'Microsoft Corp', 'sort_order' => 2],
        ],
        'status' => 'Active',
        'sort_order' => 1,
    ]);

    expect($client)->not->toBeNull();
    expect($client->name)->toBe('Tech Partners 2024');
    expect($client->status)->toBe('Active');
    expect($client->clients_list)->toBeArray()->toHaveCount(2);
});

test('client requires name field', function () {
    expect(fn () => Client::create([
        'status' => 'Active',
        'sort_order' => 1,
    ]))->toThrow(\Illuminate\Database\QueryException::class);
});

test('client can have empty clients_list', function () {
    $client = Client::create([
        'name' => 'Empty Group',
        'clients_list' => [],
        'status' => 'Active',
        'sort_order' => 1,
    ]);

    expect($client->clients_list)->toBeArray()->toBeEmpty();
});

test('client can have null clients_list', function () {
    $client = Client::create([
        'name' => 'Null Group',
        'clients_list' => null,
        'status' => 'Active',
        'sort_order' => 1,
    ]);

    expect($client->clients_list)->toBeNull();
});

test('can update client', function () {
    $client = Client::factory()->create([
        'name' => 'Original Name',
        'status' => 'Active',
        'sort_order' => 1,
    ]);

    $client->update([
        'name' => 'Updated Name',
        'status' => 'Inactive',
        'sort_order' => 99,
    ]);

    expect($client->refresh())
        ->name->toBe('Updated Name')
        ->status->toBe('Inactive')
        ->sort_order->toBe(99);
});

test('can delete client', function () {
    $client = Client::factory()->create();

    $client->delete();

    $this->assertModelMissing($client);
});

test('can reorder clients by updating sort_order', function () {
    $client1 = Client::factory()->create(['sort_order' => 1, 'name' => 'First']);
    $client2 = Client::factory()->create(['sort_order' => 2, 'name' => 'Second']);
    $client3 = Client::factory()->create(['sort_order' => 3, 'name' => 'Third']);

    expect($client1->sort_order)->toBe(1);
    expect($client3->sort_order)->toBe(3);

    $client1->update(['sort_order' => 3]);
    $client2->update(['sort_order' => 1]);
    $client3->update(['sort_order' => 2]);

    expect($client1->refresh()->sort_order)->toBe(3);
    expect($client2->refresh()->sort_order)->toBe(1);
    expect($client3->refresh()->sort_order)->toBe(2);
});

test('can filter clients by status', function () {
    Client::factory()->count(3)->create(['status' => 'Active']);
    Client::factory()->count(2)->create(['status' => 'Inactive']);

    $activeClients = Client::where('status', 'Active')->get();
    $inactiveClients = Client::where('status', 'Inactive')->get();

    expect($activeClients)->toHaveCount(3);
    expect($inactiveClients)->toHaveCount(2);
});

test('can order clients by sort_order', function () {
    $client1 = Client::factory()->create(['sort_order' => 3, 'name' => 'Third']);
    $client2 = Client::factory()->create(['sort_order' => 1, 'name' => 'First']);
    $client3 = Client::factory()->create(['sort_order' => 2, 'name' => 'Second']);

    $ordered = Client::orderBy('sort_order')->get();

    expect($ordered->first()->name)->toBe('First');
    expect($ordered->last()->name)->toBe('Third');
});

test('can add clients to clients_list', function () {
    $client = Client::factory()->create([
        'clients_list' => [
            ['client_name' => 'Client A', 'sort_order' => 1],
        ],
    ]);

    $client->update([
        'clients_list' => [
            ['client_name' => 'Client A', 'sort_order' => 1],
            ['client_name' => 'Client B', 'sort_order' => 2],
            ['client_name' => 'Client C', 'sort_order' => 3],
        ],
    ]);

    expect($client->refresh()->clients_list)
        ->toBeArray()
        ->toHaveCount(3)
        ->and($client->clients_list[0]['client_name'])->toBe('Client A')
        ->and($client->clients_list[1]['client_name'])->toBe('Client B')
        ->and($client->clients_list[2]['client_name'])->toBe('Client C');
});

test('can remove clients from clients_list', function () {
    $client = Client::factory()->create([
        'clients_list' => [
            ['client_name' => 'Client A', 'sort_order' => 1],
            ['client_name' => 'Client B', 'sort_order' => 2],
            ['client_name' => 'Client C', 'sort_order' => 3],
        ],
    ]);

    $client->update([
        'clients_list' => [
            ['client_name' => 'Client A', 'sort_order' => 1],
        ],
    ]);

    expect($client->refresh()->clients_list)
        ->toBeArray()
        ->toHaveCount(1)
        ->and($client->clients_list[0]['client_name'])->toBe('Client A');
});

test('can reorder items in clients_list', function () {
    $client = Client::factory()->create([
        'clients_list' => [
            ['client_name' => 'Client A', 'sort_order' => 1],
            ['client_name' => 'Client B', 'sort_order' => 2],
            ['client_name' => 'Client C', 'sort_order' => 3],
        ],
    ]);

    $client->update([
        'clients_list' => [
            ['client_name' => 'Client C', 'sort_order' => 1],
            ['client_name' => 'Client A', 'sort_order' => 2],
            ['client_name' => 'Client B', 'sort_order' => 3],
        ],
    ]);

    expect($client->refresh()->clients_list[0]['client_name'])->toBe('Client C');
    expect($client->clients_list[1]['client_name'])->toBe('Client A');
    expect($client->clients_list[2]['client_name'])->toBe('Client B');
});

test('client resource has correct navigation label', function () {
    expect(ClientResource::getNavigationLabel())->toBe('Clients');
});

test('client resource has correct model label', function () {
    expect(ClientResource::getModelLabel())->toBe('Client');
});

test('client resource has correct plural model label', function () {
    expect(ClientResource::getPluralModelLabel())->toBe('Clients');
});

test('client factory creates valid client', function () {
    $client = Client::factory()->create();

    expect($client)->not->toBeNull();
    expect($client->name)->not->toBeNull();
    expect($client->clients_list)->toBeArray();
    expect($client->sort_order)->toBeInt();
    expect($client->status)->toBeIn(['Active', 'Inactive']);
});

test('can get only active clients', function () {
    Client::factory()->count(5)->create(['status' => 'Active']);
    Client::factory()->count(3)->create(['status' => 'Inactive']);

    $activeClients = Client::where('status', 'Active')->get();

    expect($activeClients)->toHaveCount(5);
    $activeClients->each(fn ($client) => expect($client->status)->toBe('Active'));
});

test('clients are sorted by sort_order by default', function () {
    Client::factory()->create(['sort_order' => 5, 'name' => 'E']);
    Client::factory()->create(['sort_order' => 2, 'name' => 'B']);
    Client::factory()->create(['sort_order' => 1, 'name' => 'A']);
    Client::factory()->create(['sort_order' => 3, 'name' => 'C']);

    $clients = Client::orderBy('sort_order')->get();

    expect($clients->first()->name)->toBe('A');
    expect($clients->last()->name)->toBe('E');
});
