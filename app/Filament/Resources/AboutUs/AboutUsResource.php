<?php

namespace App\Filament\Resources\AboutUs;

use App\Filament\Resources\AboutUs\Pages\ManageAboutUs;
use App\Filament\Resources\AboutUs\Schemas\AboutUsForm;
use App\Models\AboutUs;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class AboutUsResource extends Resource
{
    protected static ?string $model = AboutUs::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedInformationCircle;

    protected static ?string $navigationLabel = 'About Us';

    protected static ?string $modelLabel = 'About Us';

    protected static ?string $pluralModelLabel = 'About Us';

    protected static ?int $navigationSort = 4;

    public static function form(Schema $schema): Schema
    {
        return AboutUsForm::configure($schema);
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
            'index' => ManageAboutUs::route('/'),
        ];
    }
}
