<?php

namespace App\Filament\Resources\Clients\Schemas;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Schema;

class ClientForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Client Content')
                    ->tabs([
                        Tabs\Tab::make('General Info')
                            ->icon('heroicon-o-information-circle')
                            ->schema([
                                TextInput::make('name')
                                    ->label('Client Group Name')
                                    ->required()
                                    ->maxLength(255)
                                    ->helperText('Internal name/label for this client group or block.')
                                    ->columnSpanFull(),

                                TextInput::make('sort_order')
                                    ->label('Sort Order')
                                    ->required()
                                    ->numeric()
                                    ->default(0)
                                    ->minValue(0)
                                    ->helperText('Controls order of this client group/module. Lower numbers appear first.')
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
                            ])
                            ->columns(1),

                        Tabs\Tab::make('Clients List')
                            ->icon('heroicon-o-user-group')
                            ->schema([
                                Section::make('Manage Clients')
                                    ->description('Add and organize clients in this group. Drag to reorder.')
                                    ->schema([
                                        Repeater::make('clients_list')
                                            ->label('Clients')
                                            ->schema([
                                                TextInput::make('client_name')
                                                    ->label('Client Name')
                                                    ->required()
                                                    ->maxLength(255)
                                                    ->columnSpanFull(),

                                                TextInput::make('sort_order')
                                                    ->label('Sort Order')
                                                    ->numeric()
                                                    ->default(0)
                                                    ->helperText('Optional: Used for manual ordering if not using drag-and-drop.')
                                                    ->columnSpanFull(),
                                            ])
                                            ->defaultItems(0)
                                            ->collapsible()
                                            ->reorderable()
                                            ->itemLabel(fn (array $state): ?string => $state['client_name'] ?? null)
                                            ->addActionLabel('Add Client')
                                            ->helperText('Drag items to reorder, or use sort_order for manual control.')
                                            ->columnSpanFull(),
                                    ]),
                            ])
                            ->columns(1),
                    ])
                    ->columnSpanFull()
                    ->persistTabInQueryString(),
            ]);
    }
}
