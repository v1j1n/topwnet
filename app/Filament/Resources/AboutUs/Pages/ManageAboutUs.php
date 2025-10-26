<?php

namespace App\Filament\Resources\AboutUs\Pages;

use App\Filament\Resources\AboutUs\AboutUsResource;
use App\Models\AboutUs;
use Filament\Actions\Action;
use Filament\Resources\Pages\EditRecord;

class ManageAboutUs extends EditRecord
{
    protected static string $resource = AboutUsResource::class;

    protected static ?string $title = 'About Us Settings';

    public function mount(int|string|null $record = null): void
    {
        // Get or create the singleton About Us record
        $aboutUs = AboutUs::first();

        if (! $aboutUs) {
            // Create default record if none exists
            $aboutUs = AboutUs::create([
                'title' => 'About Our Company',
                'description' => '<p>Enter your company description here.</p>',
                'company_profile_file' => 'about/profiles/company-profile.pdf',
            ]);
        }

        // Set the record ID and let parent handle the rest
        parent::mount($aboutUs->id);
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
            ->title('About Us updated')
            ->body('The About Us content has been updated successfully.');
    }
}

