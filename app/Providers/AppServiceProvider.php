<?php

namespace App\Providers;

use App\Models\AboutUsHomeSetting;
use App\Models\Banner;
use App\Models\Partner;
use App\Models\Service;
use App\Models\ServiceHomeSetting;
use App\Models\SiteSetting;
use App\Observers\AboutUsHomeSettingObserver;
use App\Observers\BannerObserver;
use App\Observers\PartnerObserver;
use App\Observers\ServiceHomeSettingObserver;
use App\Observers\ServiceObserver;
use App\Observers\SiteSettingObserver;
use App\View\Composers\SiteDataComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share site settings and services data with all views
        View::composer('*', SiteDataComposer::class);

        // Register observers for cache management
        Banner::observe(BannerObserver::class);
        Service::observe(ServiceObserver::class);
        Partner::observe(PartnerObserver::class);
        SiteSetting::observe(SiteSettingObserver::class);
        AboutUsHomeSetting::observe(AboutUsHomeSettingObserver::class);
        ServiceHomeSetting::observe(ServiceHomeSettingObserver::class);
    }
}
