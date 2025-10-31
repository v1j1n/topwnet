<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\SiteSetting;
use Illuminate\Contracts\View\View;

class AboutUsController extends Controller
{
    /**
     * Display the About Us page with dynamic content.
     *
     * Fetches the first AboutUs record and SiteSetting for dynamic content rendering.
     */
    public function __invoke(): View
    {
        // Fetch the first AboutUs record (assuming single record)
        $aboutUs = AboutUs::query()->first();

        // Fetch site settings for banner and other global data
        $siteSetting = SiteSetting::query()->first();

        // Return view with data
        return view('pages.about-us', [
            'aboutUs' => $aboutUs,
            'siteSetting' => $siteSetting,
        ]);
    }
}
