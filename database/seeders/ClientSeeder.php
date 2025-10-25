<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Client::create([
            'name' => 'Technology Partners 2024',
            'clients_list' => [
                ['client_name' => 'Google Inc.', 'sort_order' => 1],
                ['client_name' => 'Microsoft Corporation', 'sort_order' => 2],
                ['client_name' => 'Apple Inc.', 'sort_order' => 3],
                ['client_name' => 'Amazon Web Services', 'sort_order' => 4],
            ],
            'status' => 'Active',
            'sort_order' => 1,
        ]);

        Client::create([
            'name' => 'Enterprise Clients',
            'clients_list' => [
                ['client_name' => 'IBM', 'sort_order' => 1],
                ['client_name' => 'Oracle Corporation', 'sort_order' => 2],
                ['client_name' => 'SAP SE', 'sort_order' => 3],
                ['client_name' => 'Salesforce', 'sort_order' => 4],
                ['client_name' => 'Adobe Systems', 'sort_order' => 5],
            ],
            'status' => 'Active',
            'sort_order' => 2,
        ]);

        Client::create([
            'name' => 'Financial Services',
            'clients_list' => [
                ['client_name' => 'JPMorgan Chase', 'sort_order' => 1],
                ['client_name' => 'Goldman Sachs', 'sort_order' => 2],
                ['client_name' => 'Bank of America', 'sort_order' => 3],
            ],
            'status' => 'Active',
            'sort_order' => 3,
        ]);

        Client::create([
            'name' => 'Healthcare Partners',
            'clients_list' => [
                ['client_name' => 'Johnson & Johnson', 'sort_order' => 1],
                ['client_name' => 'Pfizer Inc.', 'sort_order' => 2],
                ['client_name' => 'UnitedHealth Group', 'sort_order' => 3],
                ['client_name' => 'CVS Health', 'sort_order' => 4],
            ],
            'status' => 'Active',
            'sort_order' => 4,
        ]);

        Client::create([
            'name' => 'Legacy Clients',
            'clients_list' => [
                ['client_name' => 'Old Corp A', 'sort_order' => 1],
                ['client_name' => 'Legacy Systems Inc', 'sort_order' => 2],
            ],
            'status' => 'Inactive',
            'sort_order' => 5,
        ]);
    }
}
