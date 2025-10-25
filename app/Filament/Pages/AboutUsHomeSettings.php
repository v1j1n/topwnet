<?php

namespace App\Filament\Pages;

use App\Models\AboutUsHomeSetting;
use BackedEnum;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Schema;
use Filament\Support\Exceptions\Halt;
use Filament\Support\Icons\Heroicon;
use UnitEnum;

class AboutUsHomeSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentText;

    protected string $view = 'filament.pages.about-us-home-settings';

    protected static UnitEnum|string|null $navigationGroup = 'Home Settings';

    protected static ?string $navigationLabel = 'About Us';

    protected static ?int $navigationSort = 2;

    public ?array $data = [];

    public function mount(): void
    {
        $setting = AboutUsHomeSetting::first();

        if (! $setting) {
            $setting = AboutUsHomeSetting::create([
                'title' => '',
                'heading' => '',
                'description' => '',
                'points' => [],
                'status' => 'active',
                'image' => null,
            ]);
        }

        $this->form->fill($setting->toArray());
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),

                TextInput::make('heading')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),

                RichEditor::make('description')
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
                    ])
                    ->columnSpanFull(),

                Repeater::make('points')
                    ->schema([
                        TextInput::make('point')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Enter a point'),
                    ])
                    ->addActionLabel('Add Point')
                    ->defaultItems(0)
                    ->columnSpanFull()
                    ->collapsible()
                    ->itemLabel(fn (array $state): ?string => $state['point'] ?? null)
                    ->reorderable()
                    ->grid(1),

                Select::make('status')
                    ->options([
                        'active' => 'Active',
                        'inactive' => 'Inactive',
                    ])
                    ->default('active')
                    ->required()
                    ->native(false),

                FileUpload::make('image')
                    ->image()
                    ->maxSize(1024)
                    ->disk('public')
                    ->directory('about-us')
                    ->visibility('public')
                    ->imageEditor()
                    ->helperText('Recommended size: 1000×666 pixels, Max size: 1 MB')
                    ->columnSpanFull(),
            ])
            ->statePath('data')
            ->columns(2);
    }

    public function save(): void
    {
        try {
            $data = $this->form->getState();

            $setting = AboutUsHomeSetting::first();

            if ($setting) {
                $setting->update($data);
            } else {
                AboutUsHomeSetting::create($data);
            }

            Notification::make()
                ->success()
                ->title('Settings saved')
                ->body('About Us settings have been updated successfully.')
                ->send();
        } catch (Halt $exception) {
            return;
        }
    }

    protected function getFormActions(): array
    {
        return [
            \Filament\Actions\Action::make('save')
                ->label('Save Settings')
                ->submit('save'),
        ];
    }

    protected function hasFullWidthFormActions(): bool
    {
        return false;
    }
}
