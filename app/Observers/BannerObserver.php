<?php

namespace App\Observers;

use App\Models\Banner;
use Illuminate\Support\Facades\Cache;

class BannerObserver
{
    /**
     * Handle the Banner "created" event.
     */
    public function created(Banner $banner): void
    {
        $this->clearBannerCache();
    }

    /**
     * Handle the Banner "updated" event.
     */
    public function updated(Banner $banner): void
    {
        $this->clearBannerCache();
    }

    /**
     * Handle the Banner "deleted" event.
     */
    public function deleted(Banner $banner): void
    {
        $this->clearBannerCache();
    }

    /**
     * Handle the Banner "restored" event.
     */
    public function restored(Banner $banner): void
    {
        $this->clearBannerCache();
    }

    /**
     * Handle the Banner "force deleted" event.
     */
    public function forceDeleted(Banner $banner): void
    {
        $this->clearBannerCache();
    }

    /**
     * Clear all banner-related cache.
     */
    private function clearBannerCache(): void
    {
        Cache::forget('home.banners');
    }
}
