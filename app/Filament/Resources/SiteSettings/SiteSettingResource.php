<?php

namespace App\Filament\Resources\SiteSettings;

use App\Filament\Resources\SiteSettings\Pages\ManageSiteSettings;
use App\Filament\Resources\SiteSettings\Schemas\SiteSettingForm;
use App\Models\SiteSetting;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Database\Eloquent\Model;

class SiteSettingResource extends Resource
{
    protected static ?string $model = SiteSetting::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    protected static ?string $navigationLabel = 'Site Settings';

    protected static ?string $modelLabel = 'Site Setting';

    protected static ?int $navigationSort = 99;

    public static function form(Schema $schema): Schema
    {
        return SiteSettingForm::configure($schema);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageSiteSettings::route('/'),
        ];
    }

    // Disable create permission for singleton
    public static function canCreate(): bool
    {
        return false;
    }

    // Disable delete permission for singleton
    public static function canDelete(Model $record): bool
    {
        return false;
    }

    // Disable view any (list view) since we're using edit directly
    public static function canViewAny(): bool
    {
        return true; // Allow viewing to enable navigation
    }

    // Override the navigation URL to go directly to the edit page
    public static function getNavigationUrl(): string
    {
        return static::getUrl('index');
    }
}
