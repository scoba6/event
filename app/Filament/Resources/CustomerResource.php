<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Enums\Titre;
use Filament\Tables;
use App\Models\Customer;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\CustomerResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CustomerResource\RelationManagers;

class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;
    protected ?string $maxContentWidth = 'full';
    protected static ?string $navigationGroup = 'GESTION';
    protected static ?string $navigationLabel = 'Clients';
    protected static ?string $recordTitleAttribute = 'nomcli';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationIcon = 'heroicon-o-user-group';



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('titcli')->label('TITRE')->required()->options(Titre::class)->columnSpan('full'),
                TextInput::make('nomcli')->required()->label('NOM')->columnSpan('full')->unique(ignoreRecord: true),
                TextInput::make('maicli')->label('E-MAIL')->email(),
                TextInput::make('telcli')->required()->label('TELEPHONE'),
                Textarea::make('adrcli')->label('ADRESSE')->columnSpan('full'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nomcli')->sortable()->label('NOM')->searchable(),
                TextColumn::make('maicli')->sortable()->label('E-MAIL')->searchable(),
                TextColumn::make('telcli')->sortable()->label('TELEPHONE')->searchable(),
                TextColumn::make('adrcli')->sortable()->label('ADRESSE')->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\EventsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCustomers::route('/'),
            'create' => Pages\CreateCustomer::route('/create'),
            'edit' => Pages\EditCustomer::route('/{record}/edit'),
        ];
    }
}
