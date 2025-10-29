<?php

namespace App\Http\Controllers;

use App\Models\AboutUsHomeSetting;
use App\Models\Banner;
use App\Models\Partner;
use App\Models\Service;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;

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

        // Fetch active partners sorted by sort_order (cached for performance)
        $partners = Cache::remember('home.partners', 3600, function () {
            return Partner::query()
                ->select(['id', 'name', 'logo'])
                ->where('status', 'active')
                ->orderBy('sort_order')
                ->get();
        });

        // Fetch active services sorted by sort_order
        $services = Service::query()
            ->select(['id', 'title', 'slug', 'image', 'alt_text', 'primary_label', 'secondary_label', 'title_hover'])
            ->where('status', 'active')
            ->orderBy('sort_order')
            ->get();

        return view('pages.home', compact('banners', 'aboutUs', 'partners', 'services'));
    }
}
