<?php

namespace App\Filament\Resources\Partners;

use App\Filament\Resources\Partners\Pages\CreatePartner;
use App\Filament\Resources\Partners\Pages\EditPartner;
use App\Filament\Resources\Partners\Pages\ListPartners;
use App\Filament\Resources\Partners\Schemas\PartnerForm;
use App\Filament\Resources\Partners\Tables\PartnersTable;
use App\Models\Partner;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PartnerResource extends Resource
{
    protected static ?string $model = Partner::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBuildingOffice2;

    protected static ?string $navigationLabel = 'Partners';

    protected static ?string $modelLabel = 'Partner';

    protected static ?string $pluralModelLabel = 'Partners';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return PartnerForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PartnersTable::configure($table);
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
            'index' => ListPartners::route('/'),
            'create' => CreatePartner::route('/create'),
            'edit' => EditPartner::route('/{record}/edit'),
        ];
    }
}
