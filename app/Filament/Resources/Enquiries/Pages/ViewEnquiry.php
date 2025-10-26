<?php

namespace App\Filament\Resources\Enquiries\Pages;

use App\Filament\Resources\Enquiries\EnquiryResource;
use Filament\Actions\DeleteAction;
use Filament\Forms\Components\Placeholder;
use Filament\Resources\Pages\ViewRecord;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ViewEnquiry extends ViewRecord
{
    protected static string $resource = EnquiryResource::class;

    protected static ?string $title = 'View Enquiry';

    public function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Enquiry Details')
                    ->schema([
                        Placeholder::make('name')
                            ->label('Name')
                            ->content(fn ($record) => $record->name),

                        Placeholder::make('email')
                            ->label('Email')
                            ->content(fn ($record) => $record->email),

                        Placeholder::make('phone')
                            ->label('Phone Number')
                            ->content(fn ($record) => $record->phone ?? 'N/A'),

                        Placeholder::make('service_name')
                            ->label('Service Interested In')
                            ->content(fn ($record) => $record->service_name ?? 'N/A'),

                        Placeholder::make('message')
                            ->label('Message')
                            ->content(fn ($record) => $record->message)
                            ->columnSpanFull(),

                        Placeholder::make('created_at')
                            ->label('Submitted At')
                            ->content(fn ($record) => $record->created_at->format('F j, Y g:i A')),
                    ])
                    ->columns(2),
            ]);
    }

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
