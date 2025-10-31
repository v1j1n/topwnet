<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Contracts\View\View;

class ServiceController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(string $slug): View
    {
        // Fetch the service by slug or fail with 404
        $service = Service::query()
            ->where('slug', $slug)
            ->where('status', 'active')
            ->firstOrFail();

        // Fetch all other active services for the sidebar, ordered by sort_order
        $otherServices = Service::query()
            ->where('status', 'active')
            ->orderBy('sort_order')
            ->orderBy('title')
            ->get();

        return view('pages.services.show', compact('service', 'otherServices'));
    }
}

