<?php

namespace App\Filament\Pages;

use App\Models\ServiceHomeSetting;
use BackedEnum;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Schema;
use Filament\Support\Exceptions\Halt;
use Filament\Support\Icons\Heroicon;
use UnitEnum;

class ServiceHomeSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog;

    protected string $view = 'filament.pages.service-home-settings';

    protected static UnitEnum|string|null $navigationGroup = 'Home Settings';

    protected static ?string $navigationLabel = 'Service';

    protected static ?int $navigationSort = 3;

    public ?array $data = [];

    public function mount(): void
    {
        $setting = ServiceHomeSetting::first();

        if (! $setting) {
            $setting = ServiceHomeSetting::create([
                'title' => '',
                'heading' => '',
                'description' => '',
                'highlights' => [],
                'offerings' => [],
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
                    ->helperText('Main title of the service section.')
                    ->columnSpanFull(),

                TextInput::make('heading')
                    ->required()
                    ->maxLength(255)
                    ->helperText('Headline that appears prominently.')
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
                    ->helperText('Detailed text describing this section.')
                    ->columnSpanFull(),

                Repeater::make('highlights')
                    ->schema([
                        TextInput::make('highlight_item')
                            ->label('Highlight')
                            ->required()
                            ->maxLength(255)
                            ->helperText('Key point to highlight.')
                            ->placeholder('Enter a highlight'),
                    ])
                    ->addActionLabel('Add Highlight')
                    ->defaultItems(0)
                    ->columnSpanFull()
                    ->collapsible()
                    ->itemLabel(fn (array $state): ?string => $state['highlight_item'] ?? null)
                    ->reorderable()
                    ->grid(1),

                Repeater::make('offerings')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->helperText('Name of the service or offering.')
                            ->placeholder('Service name'),

                        TextInput::make('number_tag')
                            ->label('Number Tag')
                            ->required()
                            ->maxLength(10)
                            ->helperText('Numerical tag or label (e.g. 01, 02, etc).')
                            ->placeholder('01'),
                    ])
                    ->addActionLabel('Add Offering')
                    ->defaultItems(0)
                    ->columnSpanFull()
                    ->collapsible()
                    ->itemLabel(fn (array $state): ?string => ($state['number_tag'] ?? '').' - '.($state['title'] ?? ''))
                    ->reorderable()
                    ->columns(2)
                    ->grid(1),
            ])
            ->statePath('data')
            ->columns(1);
    }

    public function save(): void
    {
        try {
            $data = $this->form->getState();

            $setting = ServiceHomeSetting::first();

            if ($setting) {
                $setting->update($data);
            } else {
                ServiceHomeSetting::create($data);
            }

            Notification::make()
                ->success()
                ->title('Settings saved')
                ->body('Service settings have been updated successfully.')
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
