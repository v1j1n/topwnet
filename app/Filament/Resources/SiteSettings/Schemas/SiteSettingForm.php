<?php

namespace App\Filament\Resources\SiteSettings\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Schema;

class SiteSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Site Settings')
                    ->tabs([
                        Tabs\Tab::make('General Settings')
                            ->icon('heroicon-o-cog-6-tooth')
                            ->schema([
                                Section::make('Contact Information')
                                    ->schema([
                                        Repeater::make('emails')
                                            ->label('Email Addresses')
                                            ->schema([
                                                TextInput::make('email')
                                                    ->label('Email')
                                                    ->required()
                                                    ->email()
                                                    ->maxLength(255)
                                                    ->columnSpanFull(),
                                            ])
                                            ->defaultItems(0)
                                            ->collapsible()
                                            ->itemLabel(fn (array $state): ?string => $state['email'] ?? null)
                                            ->addActionLabel('Add Email')
                                            ->helperText('Add multiple email addresses for your company.')
                                            ->columnSpanFull(),

                                        Repeater::make('mobile_numbers')
                                            ->label('Phone Numbers')
                                            ->schema([
                                                TextInput::make('phone')
                                                    ->label('Phone Number')
                                                    ->required()
                                                    ->tel()
                                                    ->maxLength(255)
                                                    ->columnSpanFull(),
                                            ])
                                            ->defaultItems(0)
                                            ->collapsible()
                                            ->itemLabel(fn (array $state): ?string => $state['phone'] ?? null)
                                            ->addActionLabel('Add Phone Number')
                                            ->helperText('Add multiple phone numbers for your company.')
                                            ->columnSpanFull(),

                                        TextInput::make('address')
                                            ->label('Address')
                                            ->maxLength(500)
                                            ->helperText('Company address.')
                                            ->columnSpanFull(),

                                        TextInput::make('footer_note')
                                            ->label('Footer Note')
                                            ->maxLength(255)
                                            ->helperText('Short note displayed in the footer.')
                                            ->columnSpanFull(),
                                    ]),

                                Section::make('Social Media Links')
                                    ->description('Add your social media profile URLs')
                                    ->schema([
                                        TextInput::make('facebook_url')
                                            ->label('Facebook URL')
                                            ->url()
                                            ->maxLength(500)
                                            ->placeholder('https://facebook.com/yourpage')
                                            ->helperText('Full URL to your Facebook page.')
                                            ->columnSpanFull(),

                                        TextInput::make('instagram_url')
                                            ->label('Instagram URL')
                                            ->url()
                                            ->maxLength(500)
                                            ->placeholder('https://instagram.com/yourprofile')
                                            ->helperText('Full URL to your Instagram profile.')
                                            ->columnSpanFull(),

                                        TextInput::make('x_url')
                                            ->label('X (Twitter) URL')
                                            ->url()
                                            ->maxLength(500)
                                            ->placeholder('https://x.com/yourprofile')
                                            ->helperText('Full URL to your X (Twitter) profile.')
                                            ->columnSpanFull(),

                                        TextInput::make('linkedin_url')
                                            ->label('LinkedIn URL')
                                            ->url()
                                            ->maxLength(500)
                                            ->placeholder('https://linkedin.com/company/yourcompany')
                                            ->helperText('Full URL to your LinkedIn company page.')
                                            ->columnSpanFull(),
                                    ])
                                    ->columns(2),

                                Section::make('Google Map')
                                    ->schema([
                                        Textarea::make('google_map_url')
                                            ->label('Google Map Embed URL / iframe')
                                            ->rows(4)
                                            ->helperText('Paste the Google Maps embed URL or full iframe code.')
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        Tabs\Tab::make('Page Banners')
                            ->icon('heroicon-o-photo')
                            ->schema([
                                Section::make('Banner Images')
                                    ->description('Upload banner images for different pages. Recommended dimensions: 1920px × 474px')
                                    ->schema([
                                        FileUpload::make('client_banner')
                                            ->label('Client Page Banner')
                                            ->image()
                                            ->maxSize(1024)
                                            ->disk('public')
                                            ->directory('banners')
                                            ->visibility('public')
                                            ->imageEditor()
                                            ->helperText('📐 Recommended dimensions: 1920px width × 474px height. Max file size: 1MB.')
                                            ->columnSpanFull(),

                                        FileUpload::make('partner_banner')
                                            ->label('Partner Page Banner')
                                            ->image()
                                            ->maxSize(1024)
                                            ->disk('public')
                                            ->directory('banners')
                                            ->visibility('public')
                                            ->imageEditor()
                                            ->helperText('📐 Recommended dimensions: 1920px width × 474px height. Max file size: 1MB.')
                                            ->columnSpanFull(),

                                        FileUpload::make('contact_banner')
                                            ->label('Contact Page Banner')
                                            ->image()
                                            ->maxSize(1024)
                                            ->disk('public')
                                            ->directory('banners')
                                            ->visibility('public')
                                            ->imageEditor()
                                            ->helperText('📐 Recommended dimensions: 1920px width × 474px height. Max file size: 1MB.')
                                            ->columnSpanFull(),

                                        FileUpload::make('aboutus_banner')
                                            ->label('About Us Page Banner')
                                            ->image()
                                            ->maxSize(1024)
                                            ->disk('public')
                                            ->directory('banners')
                                            ->visibility('public')
                                            ->imageEditor()
                                            ->helperText('📐 Recommended dimensions: 1920px width × 474px height. Max file size: 1MB.')
                                            ->columnSpanFull(),

                                        FileUpload::make('services_banner')
                                            ->label('Services Page Banner')
                                            ->image()
                                            ->maxSize(1024)
                                            ->disk('public')
                                            ->directory('banners')
                                            ->visibility('public')
                                            ->imageEditor()
                                            ->helperText('📐 Recommended dimensions: 1920px width × 474px height. Max file size: 1MB.')
                                            ->columnSpanFull(),
                                    ]),
                            ]),
                    ])
                    ->columnSpanFull()
                    ->persistTabInQueryString(),
            ]);
    }
}
