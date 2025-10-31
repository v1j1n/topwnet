<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\View\View;

class ClientController extends Controller
{
    public function index(): View
    {
        $clients = Client::query()
            ->where('status', 'Active')
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        return view('pages.clients', compact('clients'));
    }
}
