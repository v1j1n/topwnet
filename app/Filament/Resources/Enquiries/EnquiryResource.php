<?php

namespace App\Filament\Resources\Enquiries;

use App\Filament\Resources\Enquiries\Pages\ListEnquiries;
use App\Filament\Resources\Enquiries\Pages\ViewEnquiry;
use App\Filament\Resources\Enquiries\Tables\EnquiriesTable;
use App\Models\Enquiry;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class EnquiryResource extends Resource
{
    protected static ?string $model = Enquiry::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedEnvelope;

    protected static ?string $navigationLabel = 'Enquiries';

    protected static ?string $modelLabel = 'Enquiry';

    protected static ?string $pluralModelLabel = 'Enquiries';

    protected static ?int $navigationSort = 6;

    public static function table(Table $table): Table
    {
        return EnquiriesTable::configure($table);
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
            'index' => ListEnquiries::route('/'),
            'view' => ViewEnquiry::route('/{record}'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }
}
