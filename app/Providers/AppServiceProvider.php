<?php

namespace App\Providers;

use App\Models\Banner;
use App\Models\Service;
use App\Observers\BannerObserver;
use App\Observers\ServiceObserver;
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

        // Register observers
        Banner::observe(BannerObserver::class);
        Service::observe(ServiceObserver::class);
    }
}
