<?php

namespace App\Filament\Widgets;

use App\Models\ContactEnquiry;
use Filament\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;

class RecentContactEnquiries extends TableWidget
{
    protected static ?int $sort = 3;

    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                ContactEnquiry::query()->latest()->limit(5)
            )
            ->heading('Recent Contact Enquiries')
            ->columns([
                TextColumn::make('name')
                    ->label('Name')
                    ->searchable()
                    ->weight('medium'),

                TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->copyable()
                    ->icon('heroicon-o-envelope'),

                TextColumn::make('phone')
                    ->label('Phone')
                    ->icon('heroicon-o-phone'),

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
                    ->modalHeading(fn (ContactEnquiry $record) => 'Contact from '.$record->name)
                    ->modalContent(fn (ContactEnquiry $record) => view('filament.widgets.contact-enquiry-details', ['record' => $record]))
                    ->modalSubmitAction(false)
                    ->modalCancelActionLabel('Close')
                    ->modalWidth('lg'),
            ])
            ->paginated(false);
    }
}
