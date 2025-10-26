<?php

namespace App\Filament\Resources\SiteSettings\Pages;

use App\Filament\Resources\SiteSettings\SiteSettingResource;
use App\Models\SiteSetting;
use Filament\Resources\Pages\EditRecord;

class ManageSiteSettings extends EditRecord
{
    protected static string $resource = SiteSettingResource::class;

    protected static ?string $title = 'Site Settings';

    public function mount(int|string|null $record = null): void
    {
        // Get or create the singleton Site Setting record
        $settings = SiteSetting::first();

        if (! $settings) {
            // Create default record if none exists
            $settings = SiteSetting::create([
                'emails' => [],
                'mobile_numbers' => [],
            ]);
        }

        // Set the record ID and let parent handle the rest
        parent::mount($settings->id);
    }

    protected function getHeaderActions(): array
    {
        return [
            // Remove delete action since this is a singleton
        ];
    }

    protected function getRedirectUrl(): ?string
    {
        // Stay on the same page after saving
        return null;
    }

    protected function getSavedNotification(): ?\Filament\Notifications\Notification
    {
        return \Filament\Notifications\Notification::make()
            ->success()
            ->title('Settings saved')
            ->body('Site settings have been updated successfully.');
    }
}
