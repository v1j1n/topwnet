<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Contracts\View\View;

class PartnerController extends Controller
{
    /**
     * Display the Partners page with dynamic content.
     */
    public function __invoke(): View
    {
        // Fetch all active partners sorted by sort order
        $partners = Partner::query()
            ->where('status', 'Active')
            ->orderBy('sort_order')
            ->get();

        return view('pages.partners', [
            'partners' => $partners,
        ]);
    }
}
