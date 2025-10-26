<?php

namespace App\Filament\Widgets;

use App\Models\Enquiry;
use Filament\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;

class RecentEnquiries extends TableWidget
{
    protected static ?int $sort = 2;

    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Enquiry::query()->latest()->limit(5)
            )
            ->heading('Recent General Enquiries')
            ->columns([
                TextColumn::make('name')
                    ->label('Name')
                    ->searchable()
                    ->weight('medium'),

                TextColumn::make('service_name')
                    ->label('Service')
                    ->badge()
                    ->color('info'),

                TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->copyable()
                    ->icon('heroicon-o-envelope'),

                TextColumn::make('created_at')
                    ->label('Submitted')
                    ->dateTime()
                    ->since()
                    ->sortable(),
            ])
            ->recordActions([
                Action::make('view')
                    ->label('View')
                    ->icon('heroicon-o-eye')
                    ->modalHeading(fn (Enquiry $record) => 'Enquiry from '.$record->name)
                    ->modalContent(fn (Enquiry $record) => view('filament.widgets.enquiry-details', ['record' => $record]))
                    ->modalSubmitAction(false)
                    ->modalCancelActionLabel('Close')
                    ->modalWidth('lg'),
            ])
            ->paginated(false);
    }
}
