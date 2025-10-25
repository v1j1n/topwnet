<?php

namespace App\Filament\Resources\Banners\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Schema;

class BannerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Group::make()
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),

                        TextInput::make('heading_1')
                            ->label('Heading 1')
                            ->maxLength(255),

                        TextInput::make('heading_2')
                            ->label('Heading 2')
                            ->maxLength(255),

                        Textarea::make('description')
                            ->rows(4)
                            ->columnSpanFull(),

                        TextInput::make('sort_order')
                            ->numeric()
                            ->default(0)
                            ->minValue(0),

                        Toggle::make('status')
                            ->label('Active')
                            ->default(true)
                            ->inline(false),
                    ])
                    ->columns(2),

                Group::make()
                    ->schema([
                        FileUpload::make('image')
                            ->required(fn (string $operation): bool => $operation === 'create')
                            ->image()
                            ->maxSize(1024)
                            ->disk('public')
                            ->directory('banners')
                            ->visibility('public')
                            ->imageEditor()
                            ->imageCropAspectRatio('1848:709')
                            ->imageResizeTargetWidth('1848')
                            ->imageResizeTargetHeight('709')
                            ->dehydrated(fn ($state) => filled($state))
                            ->rules([
                                fn (string $operation): string => $operation === 'create'
                                    ? 'dimensions:width=1848,height=709'
                                    : 'nullable|dimensions:width=1848,height=709',
                            ])
                            ->helperText('Required dimensions: 1848 × 709 pixels. Maximum file size: 1MB.')
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
