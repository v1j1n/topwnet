<?php

namespace App\Filament\Resources\AboutUs\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Schema;

class AboutUsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('About Us Content')
                    ->tabs([
                        Tabs\Tab::make('General Info')
                            ->icon('heroicon-o-information-circle')
                            ->schema([
                                Section::make('Basic Information')
                                    ->schema([
                                        TextInput::make('title')
                                            ->label('Title')
                                            ->required()
                                            ->maxLength(255)
                                            ->helperText('Main title for the About Us section.')
                                            ->columnSpanFull(),

                                        RichEditor::make('description')
                                            ->label('Description')
                                            ->required()
                                            ->toolbarButtons([
                                                'bold',
                                                'italic',
                                                'underline',
                                                'link',
                                                'bulletList',
                                                'orderedList',
                                                'h2',
                                                'h3',
                                            ])
                                            ->helperText('Detailed description for the About Us section.')
                                            ->columnSpanFull(),
                                    ]),

                                Section::make('Leadership')
                                    ->schema([
                                        TextInput::make('chairman_name')
                                            ->label('Chairman Name')
                                            ->maxLength(255)
                                            ->columnSpanFull(),

                                        TextInput::make('designation')
                                            ->label('Designation')
                                            ->maxLength(255)
                                            ->columnSpanFull(),
                                    ])
                                    ->columns(2),

                                Section::make('Files & Images')
                                    ->schema([
                                        FileUpload::make('about_section_image')
                                            ->label('About Section Image')
                                            ->image()
                                            ->maxSize(1024)
                                            ->disk('public')
                                            ->directory('about/section')
                                            ->visibility('public')
                                            ->imageEditor()
                                            ->helperText('Optional. Recommended size: 1000x666px. Max file size: 1MB.')
                                            ->columnSpanFull(),

                                        FileUpload::make('company_profile_file')
                                            ->label('Company Profile File')
                                            ->required()
                                            ->acceptedFileTypes(['application/pdf'])
                                            ->maxSize(1536)
                                            ->disk('public')
                                            ->directory('about/profiles')
                                            ->visibility('public')
                                            ->helperText('Upload company profile PDF. Max file size: 1.5MB.')
                                            ->columnSpanFull(),
                                    ]),

                                Section::make('Statistics')
                                    ->description('Key performance indicators and metrics')
                                    ->schema([
                                        TextInput::make('year_of_innovation')
                                            ->label('Year of Innovation')
                                            ->numeric()
                                            ->minValue(1900)
                                            ->maxValue(2100)
                                            ->helperText('The year your company was founded or started innovating.'),

                                        TextInput::make('successful_projects')
                                            ->label('Successful Projects')
                                            ->numeric()
                                            ->minValue(0)
                                            ->helperText('Total number of successful projects completed.'),

                                        TextInput::make('client_retention')
                                            ->label('Client Retention (%)')
                                            ->numeric()
                                            ->minValue(0)
                                            ->maxValue(100)
                                            ->suffix('%')
                                            ->helperText('Client retention rate as a percentage.'),
                                    ])
                                    ->columns(3),
                            ]),

                        Tabs\Tab::make('Mission & Vision')
                            ->icon('heroicon-o-light-bulb')
                            ->schema([
                                Section::make('Mission Statement')
                                    ->description('Define your company mission and key points')
                                    ->schema([
                                        TextInput::make('mission')
                                            ->label('Mission')
                                            ->maxLength(500)
                                            ->helperText('Short mission statement.')
                                            ->columnSpanFull(),

                                        Repeater::make('mission_points')
                                            ->label('Mission Points')
                                            ->schema([
                                                TextInput::make('point')
                                                    ->label('Mission Point')
                                                    ->required()
                                                    ->maxLength(255)
                                                    ->columnSpanFull(),
                                            ])
                                            ->defaultItems(0)
                                            ->collapsible()
                                            ->itemLabel(fn (array $state): ?string => $state['point'] ?? null)
                                            ->addActionLabel('Add Mission Point')
                                            ->helperText('Add key points that support your mission statement.')
                                            ->columnSpanFull(),
                                    ]),

                                Section::make('Vision Statement')
                                    ->description('Define your company vision and key points')
                                    ->schema([
                                        TextInput::make('vision')
                                            ->label('Vision')
                                            ->maxLength(500)
                                            ->helperText('Short vision statement.')
                                            ->columnSpanFull(),

                                        Repeater::make('vision_points')
                                            ->label('Vision Points')
                                            ->schema([
                                                TextInput::make('point')
                                                    ->label('Vision Point')
                                                    ->required()
                                                    ->maxLength(255)
                                                    ->columnSpanFull(),
                                            ])
                                            ->defaultItems(0)
                                            ->collapsible()
                                            ->itemLabel(fn (array $state): ?string => $state['point'] ?? null)
                                            ->addActionLabel('Add Vision Point')
                                            ->helperText('Add key points that support your vision statement.')
                                            ->columnSpanFull(),
                                    ]),

                                Section::make('Core Values')
                                    ->description('Define your company values')
                                    ->schema([
                                        TextInput::make('our_values')
                                            ->label('Our Values')
                                            ->maxLength(500)
                                            ->helperText('Short introduction to your company values.')
                                            ->columnSpanFull(),

                                        Repeater::make('our_values_points')
                                            ->label('Values Points')
                                            ->schema([
                                                TextInput::make('point')
                                                    ->label('Value Point')
                                                    ->required()
                                                    ->maxLength(255)
                                                    ->columnSpanFull(),
                                            ])
                                            ->defaultItems(0)
                                            ->collapsible()
                                            ->itemLabel(fn (array $state): ?string => $state['point'] ?? null)
                                            ->addActionLabel('Add Value Point')
                                            ->helperText('Add key values that guide your company.')
                                            ->columnSpanFull(),
                                    ]),

                                Section::make('Additional Metrics')
                                    ->schema([
                                        TextInput::make('client_satisfaction')
                                            ->label('Client Satisfaction (%)')
                                            ->numeric()
                                            ->minValue(0)
                                            ->maxValue(100)
                                            ->suffix('%')
                                            ->helperText('Client satisfaction rate as a percentage.'),

                                        TextInput::make('projects_delivered')
                                            ->label('Projects Delivered')
                                            ->numeric()
                                            ->minValue(0)
                                            ->helperText('Total number of projects delivered.'),
                                    ])
                                    ->columns(2),

                                Section::make('Vision & Mission Image')
                                    ->schema([
                                        FileUpload::make('vision_mission_image')
                                            ->label('Vision & Mission Image')
                                            ->image()
                                            ->maxSize(1024)
                                            ->disk('public')
                                            ->directory('about/vision')
                                            ->visibility('public')
                                            ->imageEditor()
                                            ->helperText('Optional. Recommended size: 556x658px. Max file size: 1MB.')
                                            ->columnSpanFull(),
                                    ]),
                            ]),
                    ])
                    ->columnSpanFull()
                    ->persistTabInQueryString(),
            ]);
    }
}
