<?php

namespace App\Observers;

use App\Models\AboutUsHomeSetting;
use Illuminate\Support\Facades\Cache;

class AboutUsHomeSettingObserver
{
    /**
     * Handle the AboutUsHomeSetting "updated" event.
     * AboutUsHomeSetting is a singleton, so we only need to clear cache on update.
     */
    public function updated(AboutUsHomeSetting $aboutUsHomeSetting): void
    {
        $this->clearAboutUsCache();
    }

    /**
     * Clear all about us related cache.
     */
    private function clearAboutUsCache(): void
    {
        Cache::forget('home.about_us');
    }
}
