<?php

namespace App\Filament\Resources\SiteSettings\Pages;

use App\Filament\Resources\SiteSettings\SiteSettingResource;
use Filament\Actions\DeleteAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Cache;

class EditSiteSetting extends EditRecord
{
    protected static string $resource = SiteSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function afterSave(): void
    {
        // Clear the cached site settings and services
        Cache::forget('site_settings');
        Cache::forget('active_services');

        Notification::make()
            ->title('Cache cleared')
            ->body('Site settings cache has been cleared successfully.')
            ->success()
            ->send();
    }
}
