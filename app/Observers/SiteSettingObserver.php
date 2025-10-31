<?php

namespace App\Observers;

use App\Models\SiteSetting;
use Illuminate\Support\Facades\Cache;

class SiteSettingObserver
{
    /**
     * Handle the SiteSetting "updated" event.
     * SiteSetting is a singleton, so we only need to clear cache on update.
     */
    public function updated(SiteSetting $siteSetting): void
    {
        $this->clearSiteSettingsCache();
    }

    /**
     * Clear all site settings related cache.
     */
    private function clearSiteSettingsCache(): void
    {
        Cache::forget('site_settings');
        Cache::forget('active_services');
    }
}
