<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Prestataire;
use Filament\Resources\Resource;
use function Laravel\Prompts\textarea;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;

use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PrestataireResource\Pages;
use App\Filament\Resources\PrestataireResource\RelationManagers;

class PrestataireResource extends Resource
{
    protected static ?string $model = Prestataire::class;
    protected ?string $maxContentWidth = 'full';
    protected static ?string $navigationGroup = 'PARAMETRES';
    protected static ?string $navigationLabel = 'Prestataires';
    protected static ?string $recordTitleAttribute = 'libpre';
    protected static ?int $navigationSort = 2;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nompre')->required()->label('NOM')->columnSpan('full')->unique(ignoreRecord: true),
                TextInput::make('telpre')->required()->label(label: 'TEL'),
                TextInput::make('maipre')->email()->label('MAIL'),
                Textarea::make('adrpre')->label('ADRESSE')->columnSpan('full'),
                Textarea::make('despre')->label('DESCRIPTION')->columnSpan('full'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nompre')->sortable()->label('NOM')->searchable(),
                TextColumn::make('telpre')->sortable()->label('TEL')->searchable(),
                TextColumn::make('maipre')->sortable()->label('MAIL')->searchable(),
                TextColumn::make('adrpre')->sortable()->label('ADRESSE')->searchable(),
                TextColumn::make('despre')->sortable()->label('DESCR.')->searchable(),
            ])
            ->filters([
                //
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManagePrestataires::route('/'),
        ];
    }
}
