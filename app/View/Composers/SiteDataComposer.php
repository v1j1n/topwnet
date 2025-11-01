<?php

namespace App\View\Composers;

use App\Models\Service;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class SiteDataComposer
{
    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        // Cache site settings for 1 hour to avoid repeated database calls
        $siteSettings = Cache::remember('site_settings', 3600, function () {
            return SiteSetting::first() ?? new SiteSetting;
        });

        // Cache active services ordered by sort_order, limit to first 6 for footer
        $services = Cache::remember('active_services', 3600, function () {
            return Service::where('status', 'Active')
                ->orderBy('sort_order')
                ->get(['id', 'title', 'slug']);
        });

        // Share data with all views
        $view->with([
            'siteSettings' => $siteSettings,
            'allServices' => $services,
            'footerServices' => $services->take(6),
        ]);
    }
}
