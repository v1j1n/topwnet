<?php

namespace App\Filament\Resources\ContactEnquiries\Schemas;

use Filament\Forms\Components\Placeholder;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ContactEnquiryInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Contact Enquiry Details')
                    ->schema([
                        Placeholder::make('name')
                            ->label('Name')
                            ->content(fn ($record) => $record->name),

                        Placeholder::make('email')
                            ->label('Email')
                            ->content(fn ($record) => $record->email),

                        Placeholder::make('phone')
                            ->label('Phone Number')
                            ->content(fn ($record) => $record->phone),

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
}
