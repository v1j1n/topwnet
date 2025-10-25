<?php

namespace App\Filament\Resources\Partners\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PartnerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Partner Name')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(function ($set, ?string $state) {
                        $set('slug', Str::slug($state));
                    })
                    ->helperText('The display name of the partner.')
                    ->columnSpanFull(),

                TextInput::make('slug')
                    ->label('Slug')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true)
                    ->helperText('Auto-generated from name. Can be edited if needed.')
                    ->columnSpanFull(),

                FileUpload::make('logo')
                    ->label('Partner Logo')
                    ->required()
                    ->image()
                    ->maxSize(2048)
                    ->disk('public')
                    ->directory('partners')
                    ->visibility('public')
                    ->imageEditor()
                    ->helperText('Recommended dimensions: 144px × 79px')
                    ->columnSpanFull(),

                Textarea::make('short_description')
                    ->label('Short Description')
                    ->required()
                    ->rows(3)
                    ->maxLength(500)
                    ->helperText('A brief description of the partner.')
                    ->columnSpanFull(),

                TextInput::make('sort_order')
                    ->label('Sort Order')
                    ->required()
                    ->numeric()
                    ->default(0)
                    ->minValue(0)
                    ->helperText('Lower numbers appear first.')
                    ->columnSpanFull(),

                Select::make('status')
                    ->label('Status')
                    ->required()
                    ->options([
                        'Active' => 'Active',
                        'Inactive' => 'Inactive',
                    ])
                    ->default('Active')
                    ->native(false)
                    ->helperText('Controls visibility on the frontend.')
                    ->columnSpanFull(),
            ]);
    }
}
