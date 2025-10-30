<?php

namespace App\Observers;

use App\Models\Service;
use Illuminate\Support\Facades\Cache;

class ServiceObserver
{
    /**
     * Handle the Service "created" event.
     */
    public function created(Service $service): void
    {
        Cache::forget('active_services');
    }

    /**
     * Handle the Service "updated" event.
     */
    public function updated(Service $service): void
    {
        Cache::forget('active_services');
    }

    /**
     * Handle the Service "deleted" event.
     */
    public function deleted(Service $service): void
    {
        Cache::forget('active_services');
    }
}
