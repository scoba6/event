<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Prestation;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PrestationResource\Pages;
use App\Filament\Resources\PrestationResource\RelationManagers;
use Filament\Tables\Columns\IconColumn;

class PrestationResource extends Resource
{
    protected static ?string $model = Prestation::class;
    protected ?string $maxContentWidth = 'full';
    protected static ?string $navigationGroup = 'PARAMETRES';
    protected static ?string $navigationLabel = 'Prestations';
    protected static ?string $recordTitleAttribute = 'libprs';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('libprs')->required()->label('LIBELLE')->columnSpan('full')->unique(ignoreRecord: true),
                RichEditor::make('desprs')->label('DESCRIPTION')->columnSpan('full'),
                Toggle::make('is_active')->label('ACTIVE')->columnSpan('full')
                    ->onColor('success')
                    ->offColor('danger'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('libprs')->sortable()->label('LIBELLE')->searchable(),
                TextColumn::make('desprs')->sortable()->label('DESCRIPTION'),
                IconColumn::make('is_active')->sortable()->label('ACTIVE')->boolean(),
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
            'index' => Pages\ManagePrestations::route('/'),
        ];
    }
}
