<?php

namespace App\Filament\Resources\SiteSettings\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SiteSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Contact Information')
                    ->schema([
                        Repeater::make('emails')
                            ->label('Email Addresses')
                            ->simple(
                                TextInput::make('email')
                                    ->email()
                                    ->required()
                                    ->label('Email')
                            )
                            ->defaultItems(1)
                            ->columnSpanFull(),

                        Repeater::make('mobile_numbers')
                            ->label('Mobile Numbers')
                            ->simple(
                                TextInput::make('phone')
                                    ->tel()
                                    ->required()
                                    ->label('Phone Number')
                            )
                            ->defaultItems(1)
                            ->columnSpanFull(),

                        Textarea::make('address')
                            ->label('Physical Address')
                            ->rows(3)
                            ->columnSpanFull(),

                        Textarea::make('footer_note')
                            ->label('Footer Note')
                            ->rows(2)
                            ->columnSpanFull(),
                    ])
                    ->columns(2)
                    ->collapsible(),

                Section::make('Social Media Links')
                    ->schema([
                        TextInput::make('facebook_url')
                            ->label('Facebook URL')
                            ->url()
                            ->prefix('https://'),

                        TextInput::make('instagram_url')
                            ->label('Instagram URL')
                            ->url()
                            ->prefix('https://'),

                        TextInput::make('x_url')
                            ->label('X (Twitter) URL')
                            ->url()
                            ->prefix('https://'),

                        TextInput::make('linkedin_url')
                            ->label('LinkedIn URL')
                            ->url()
                            ->prefix('https://'),
                    ])
                    ->columns(2)
                    ->collapsible(),

                Section::make('Google Map')
                    ->schema([
                        Textarea::make('google_map_url')
                            ->label('Google Map Embed Code')
                            ->helperText('Paste the complete iframe embed code from Google Maps')
                            ->rows(4)
                            ->columnSpanFull(),
                    ])
                    ->collapsible()
                    ->collapsed(),

                Section::make('Page Banners')
                    ->schema([
                        FileUpload::make('client_banner')
                            ->label('Client Page Banner')
                            ->image()
                            ->disk('public')
                            ->directory('banners')
                            ->visibility('public'),

                        FileUpload::make('partner_banner')
                            ->label('Partner Page Banner')
                            ->image()
                            ->disk('public')
                            ->directory('banners')
                            ->visibility('public'),

                        FileUpload::make('contact_banner')
                            ->label('Contact Page Banner')
                            ->image()
                            ->disk('public')
                            ->directory('banners')
                            ->visibility('public'),

                        FileUpload::make('aboutus_banner')
                            ->label('About Us Page Banner')
                            ->image()
                            ->disk('public')
                            ->directory('banners')
                            ->visibility('public'),

                        FileUpload::make('services_banner')
                            ->label('Services Page Banner')
                            ->image()
                            ->disk('public')
                            ->directory('banners')
                            ->visibility('public'),
                    ])
                    ->columns(2)
                    ->collapsible()
                    ->collapsed(),
            ]);
    }
}
