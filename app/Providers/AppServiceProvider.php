<?php

namespace App\Providers;

use App\Models\Service;
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
        // Share site settings and services data with header and footer partials
        View::composer(['partials.header', 'partials.footer'], SiteDataComposer::class);

        // Register observers
        Service::observe(ServiceObserver::class);
    }
}
