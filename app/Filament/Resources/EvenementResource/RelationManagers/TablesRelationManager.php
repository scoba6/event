<?php

namespace App\Filament\Resources\EvenementResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Enums\Classification;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use EightyNine\ExcelImport\ExcelImportAction;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;
use EightyNine\ExcelImport\Tables\ExcelImportRelationshipAction;

class TablesRelationManager extends RelationManager
{
    protected static string $relationship = 'tables';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('namtab')->label('NOM DE TABLE')
                    ->required()
                    ->maxLength(255),
                TextInput::make('numtab')->label('NUMERO'),
                Select::make('clatab')->label('CLASSIFICATION')->required()->options(Classification::class)->columnSpan('full'),

            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('namtab')
            ->columns([
                TextColumn::make('namtab')->sortable()->searchable()->label('NOM'),
                TextColumn::make('numtab')->sortable()->searchable()->label('NUMERO'),
                TextColumn::make('clatab')->sortable()->searchable()->label('CLASSIFICATION'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make('Ajouter une table'),
                ExcelImportRelationshipAction::make()
                    ->slideOver()
                    ->color('primary')
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    //Tables\Actions\DeleteBulkAction::make(),

                ]),
            ]);
    }



}
