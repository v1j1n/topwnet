<?php

namespace App\Http\Controllers;

use App\Models\AboutUsHomeSetting;
use App\Models\Banner;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(): View
    {
        // Fetch active banners sorted by sort_order
        $banners = Banner::query()
            ->select(['id', 'title', 'heading_1', 'heading_2', 'description', 'image'])
            ->where('status', true)
            ->orderBy('sort_order')
            ->get();

        // Fetch active About Us home setting (only first active record)
        $aboutUs = AboutUsHomeSetting::query()
            ->select(['id', 'title', 'heading', 'description', 'points', 'image'])
            ->where('status', 'active')
            ->first();

        return view('pages.home', compact('banners', 'aboutUs'));
    }
}
