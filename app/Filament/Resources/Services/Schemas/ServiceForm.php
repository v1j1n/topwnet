<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Service Content')
                    ->tabs([
                        Tabs\Tab::make('Carousel')
                            ->icon('heroicon-o-photo')
                            ->schema([
                                TextInput::make('title')
                                    ->label('Title')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(function ($set, ?string $state) {
                                        $set('slug', Str::slug($state));
                                    })
                                    ->helperText('Main title shown in the carousel slide. Required for generating slug.')
                                    ->columnSpanFull(),

                                TextInput::make('slug')
                                    ->label('Slug')
                                    ->required()
                                    ->maxLength(255)
                                    ->unique(ignoreRecord: true)
                                    ->helperText('Auto-generated from title. Can be edited if needed.')
                                    ->columnSpanFull(),

                                TextInput::make('title_hover')
                                    ->label('Title on Hover')
                                    ->maxLength(255)
                                    ->helperText('Title displayed when user hovers over the slide.')
                                    ->columnSpanFull(),

                                TextInput::make('primary_label')
                                    ->label('Primary Label')
                                    ->maxLength(255)
                                    ->helperText('Shown as .sub-title in the carousel slide.')
                                    ->columnSpanFull(),

                                TextInput::make('secondary_label')
                                    ->label('Secondary Label')
                                    ->maxLength(255)
                                    ->helperText('Shown as .sub-title-2 in the carousel slide.')
                                    ->columnSpanFull(),

                                TextInput::make('alt_text')
                                    ->label('Alt Text')
                                    ->required()
                                    ->maxLength(255)
                                    ->helperText('Alternative text for accessibility and SEO.')
                                    ->columnSpanFull(),

                                FileUpload::make('image')
                                    ->label('Carousel Image')
                                    ->required()
                                    ->image()
                                    ->maxSize(2048)
                                    ->disk('public')
                                    ->directory('services/carousel')
                                    ->visibility('public')
                                    ->imageEditor()
                                    ->helperText('Upload image for swiper slide. Ideal size: 600×400 pixels.')
                                    ->columnSpanFull(),

                                TextInput::make('sort_order')
                                    ->label('Sort Order')
                                    ->required()
                                    ->numeric()
                                    ->default(0)
                                    ->minValue(0)
                                    ->helperText('Determines display order. Lower number = higher priority.')
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
                                    ->helperText('Controls visibility on the frontend. Only Active services are displayed.')
                                    ->columnSpanFull(),
                            ])
                            ->columns(1),

                        Tabs\Tab::make('Details')
                            ->icon('heroicon-o-document-text')
                            ->schema([
                                FileUpload::make('big_image')
                                    ->label('Hero Image')
                                    ->required()
                                    ->image()
                                    ->maxSize(3072)
                                    ->disk('public')
                                    ->directory('services/detail')
                                    ->visibility('public')
                                    ->imageEditor()
                                    ->helperText('Hero image for the detail page. Ideal size: 900×490 pixels.')
                                    ->columnSpanFull(),

                                RichEditor::make('description')
                                    ->label('Description')
                                    ->toolbarButtons([
                                        'bold',
                                        'italic',
                                        'underline',
                                        'strike',
                                        'link',
                                        'bulletList',
                                        'orderedList',
                                        'h2',
                                        'h3',
                                        'blockquote',
                                        'codeBlock',
                                    ])
                                    ->helperText('Detailed content for the service detail page. Supports rich text formatting.')
                                    ->columnSpanFull(),

                                Repeater::make('process')
                                    ->label('Process Steps')
                                    ->schema([
                                        TextInput::make('title')
                                            ->label('Step Title')
                                            ->required()
                                            ->maxLength(255),
                                        TextInput::make('description')
                                            ->label('Step Description')
                                            ->maxLength(500),
                                    ])
                                    ->defaultItems(0)
                                    ->collapsible()
                                    ->itemLabel(fn (array $state): ?string => $state['title'] ?? null)
                                    ->helperText('Add process steps for this service.')
                                    ->columnSpanFull(),

                                Repeater::make('outcomes')
                                    ->label('Outcomes')
                                    ->schema([
                                        TextInput::make('title')
                                            ->label('Outcome Title')
                                            ->required()
                                            ->maxLength(255),
                                        TextInput::make('description')
                                            ->label('Outcome Description')
                                            ->maxLength(500),
                                    ])
                                    ->defaultItems(0)
                                    ->collapsible()
                                    ->itemLabel(fn (array $state): ?string => $state['title'] ?? null)
                                    ->helperText('Add expected outcomes for this service.')
                                    ->columnSpanFull(),
                            ])
                            ->columns(1),

                        Tabs\Tab::make('Meta')
                            ->icon('heroicon-o-cog')
                            ->schema([
                                TextInput::make('meta_title')
                                    ->label('Meta Title')
                                    ->maxLength(60)
                                    ->helperText('SEO title tag. Recommended length: 50-60 characters.')
                                    ->columnSpanFull(),

                                TextInput::make('meta_description')
                                    ->label('Meta Description')
                                    ->maxLength(160)
                                    ->helperText('SEO meta description. Recommended length: 150-160 characters.')
                                    ->columnSpanFull(),

                                TextInput::make('meta_keywords')
                                    ->label('Meta Keywords')
                                    ->maxLength(255)
                                    ->helperText('Comma-separated keywords for SEO (e.g., web design, consulting, development).')
                                    ->columnSpanFull(),

                                FileUpload::make('og_image')
                                    ->label('Open Graph Image')
                                    ->image()
                                    ->maxSize(2048)
                                    ->disk('public')
                                    ->directory('services/og')
                                    ->visibility('public')
                                    ->imageEditor()
                                    ->helperText('Image for social media sharing. Recommended size: 1200×630 pixels.')
                                    ->columnSpanFull(),
                            ])
                            ->columns(1),
                    ])
                    ->columnSpanFull()
                    ->persistTabInQueryString(),
            ]);
    }
}
