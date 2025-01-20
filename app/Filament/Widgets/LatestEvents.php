<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\EvenementResource;
use App\Models\Evenement;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestEvents extends BaseWidget
{
   // protected int | string | array $columnSpan = 'full';
   protected static ?string $heading = '5 Derniers événement organisés';
    protected static ?int $sort = 4;
    public function table(Table $table): Table
    {
        return $table
            ->query(EvenementResource::getEloquentQuery())
            ->defaultPaginationPageOption(5)
            ->defaultSort('created_at', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->label('DATE')
                    ->date()
                    ->datetime('d/m/Y')
                    ->sortable(),
                Tables\Columns\TextColumn::make('customer.nomcli')
                    ->label('CLIENT')
                    ->sortable(),
                Tables\Columns\TextColumn::make('prestation.libprs')
                    ->label('TYPE')

            ])
            ->actions([
                Tables\Actions\Action::make('voir')
                    ->url(fn (Evenement $record): string => EvenementResource::getUrl('edit', ['record' => $record])),
            ]);
    }
}
