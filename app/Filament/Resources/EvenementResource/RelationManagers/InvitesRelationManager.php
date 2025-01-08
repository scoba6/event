<?php

namespace App\Filament\Resources\EvenementResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Set;
use Filament\Forms\Form;
use App\Models\Evenement;
use Filament\Tables\Table;
use App\Models\Table as ModelsTable;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class InvitesRelationManager extends RelationManager
{
    protected static string $relationship = 'invites';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('naminv')->label('NOM INVITE')->columnSpan('full')
                    ->required()
                    ->maxLength(255),
                Select::make('table_id')->label('TABLE')
                    ->required()
                    ->reactive()
                   // ->relationship('tables', 'namtab')
                    ->options(function (RelationManager $livewire): array {
                        return $livewire->getOwnerRecord()->tables()
                        ->pluck('namtab', 'id')
                        ->toArray();
                        })
                    ->afterStateUpdated(function (Set $set, $get) {
                        $cls = ModelsTable::find($get('table_id'))->clainv;
                        $set('clainv', $cls);
                        }),
                TextInput::make('clainv')->label('CLASSIFICATION')->readOnly(),
                Toggle::make('preinv')->label('PRESENCE')
                    ->onColor('success')
                    ->offColor('danger')
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('naminv')
            ->columns([
                TextColumn::make('naminv')->sortable()->searchable()->label('NOM'),
                TextColumn::make('event.libevn')->sortable()->searchable()->label('EVENEMENT'),
                TextColumn::make('table.namtab')->sortable()->searchable()->label('TABLE'),
                TextColumn::make('clainv')->sortable()->searchable()->label('CLASSIFICATION'),
                IconColumn::make('preinv')->sortable()->searchable()->label('PRESENCE')->boolean(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
