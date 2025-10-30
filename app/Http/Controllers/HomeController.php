<?php

namespace App\Http\Controllers;

use App\Models\AboutUsHomeSetting;
use App\Models\Banner;
use App\Models\Partner;
use App\Models\Service;
use App\Models\ServiceHomeSetting;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    /**
     * Cache duration in seconds (1 hour).
     */
    private const CACHE_TTL = 3600;

    /**
     * Display the homepage with all dynamic content.
     */
    public function __invoke(): View
    {
        return view('pages.home', [
            'banners' => $this->getActiveBanners(),
            'aboutUs' => $this->getAboutUsSection(),
            'partners' => $this->getActivePartners(),
            'services' => $this->getActiveServices(),
            'serviceHomeSetting' => $this->getServiceHomeSettings(),
        ]);
    }

    /**
     * Fetch active banners sorted by sort order.
     */
    private function getActiveBanners(): Collection
    {
        return Cache::remember('home.banners', self::CACHE_TTL, function () {
            return Banner::query()
                ->select(['id', 'title', 'heading_1', 'heading_2', 'description', 'image'])
                ->where('status', true)
                ->orderBy('sort_order')
                ->get();
        });
    }

    /**
     * Fetch the active About Us home setting.
     */
    private function getAboutUsSection(): ?AboutUsHomeSetting
    {
        return Cache::remember('home.about_us', self::CACHE_TTL, function () {
            return AboutUsHomeSetting::query()
                ->select(['id', 'title', 'heading', 'description', 'points', 'image'])
                ->where('status', 'active')
                ->first();
        });
    }

    /**
     * Fetch active partners sorted by sort order.
     */
    private function getActivePartners(): Collection
    {
        return Cache::remember('home.partners', self::CACHE_TTL, function () {
            return Partner::query()
                ->select(['id', 'name', 'logo'])
                ->where('status', 'active')
                ->orderBy('sort_order')
                ->get();
        });
    }

    /**
     * Fetch active services sorted by sort order.
     */
    private function getActiveServices(): Collection
    {
        return Cache::remember('home.services', self::CACHE_TTL, function () {
            return Service::query()
                ->select(['id', 'title', 'slug', 'image', 'alt_text', 'primary_label', 'secondary_label', 'title_hover'])
                ->where('status', 'active')
                ->orderBy('sort_order')
                ->get();
        });
    }

    /**
     * Fetch the service home settings for the offerings section.
     */
    private function getServiceHomeSettings(): ?ServiceHomeSetting
    {
        return Cache::remember('home.service_settings', self::CACHE_TTL, function () {
            return ServiceHomeSetting::query()
                ->select(['id', 'title', 'heading', 'description', 'highlights', 'offerings'])
                ->first();
        });
    }
}
