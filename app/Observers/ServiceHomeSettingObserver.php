<?php

namespace App\Observers;

use App\Models\ServiceHomeSetting;
use Illuminate\Support\Facades\Cache;

class ServiceHomeSettingObserver
{
    /**
     * Handle the ServiceHomeSetting "updated" event.
     * ServiceHomeSetting is a singleton, so we only need to clear cache on update.
     */
    public function updated(ServiceHomeSetting $serviceHomeSetting): void
    {
        $this->clearServiceHomeSettingsCache();
    }

    /**
     * Clear all service home settings related cache.
     */
    private function clearServiceHomeSettingsCache(): void
    {
        Cache::forget('home.service_settings');
    }
}
