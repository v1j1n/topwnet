<?php

namespace App\Observers;

use App\Models\Partner;
use Illuminate\Support\Facades\Cache;

class PartnerObserver
{
    /**
     * Handle the Partner "created" event.
     */
    public function created(Partner $partner): void
    {
        $this->clearPartnerCache();
    }

    /**
     * Handle the Partner "updated" event.
     */
    public function updated(Partner $partner): void
    {
        $this->clearPartnerCache();
    }

    /**
     * Handle the Partner "deleted" event.
     */
    public function deleted(Partner $partner): void
    {
        $this->clearPartnerCache();
    }

    /**
     * Clear all partner related cache.
     */
    private function clearPartnerCache(): void
    {
        Cache::forget('home.partners');
    }
}
