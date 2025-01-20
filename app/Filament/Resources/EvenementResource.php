<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Customer;
use Filament\Forms\Form;
use App\Models\Evenement;
use App\Models\Prestation;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use RelationManagers\CustomerRelationManager;
use RelationManagers\PrestationRelationManager;
use App\Filament\Resources\EvenementResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\EvenementResource\RelationManagers;
use Malzariey\FilamentDaterangepickerFilter\Filters\DateRangeFilter;

class EvenementResource extends Resource
{
    protected static ?string $model = Evenement::class;
    protected ?string $maxContentWidth = 'full';
    protected static ?string $navigationGroup = 'GESTION';
    protected static ?string $navigationLabel = 'Evenements';
    protected static ?string $recordTitleAttribute = 'libevn';
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('libevn')->required()->label('LIBELLE')->columnSpan('full')->unique(ignoreRecord: true),
                Select::make('customer_id')->label('CLIENT')
                    ->options(Customer::all()->pluck('nomcli', 'id')->toArray())
                    ->required(),
                Select::make('typevn')->label('TYPE')->options(Prestation::all()->pluck('libprs', 'id')->toArray())
                    ->required()
                    ->searchable(),
                DatePicker::make('strevn')->label('DU')->required(),
                DatePicker::make('endevn')->label('AU')
                    //->maxDate(now())
                    ->required(),
                RichEditor::make('desevn')->label('DESCRIPTION')->columnSpan('full'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('libevn')->sortable()->label('LIBELLE')->searchable(),
                TextColumn::make('prestation.libprs')->sortable()->label('TYPE')->searchable(),
                TextColumn::make('customer.nomcli')->sortable()->label('CLIENT')->searchable(),
                TextColumn::make('strevn')->sortable()->label('DU')
                    ->date('d/m/Y'),
                TextColumn::make('endevn')->sortable()->label('AU')
                    ->date('d/m/Y'),
            ])
            ->filters([
                DateRangeFilter::make('strevn')->label('DU/AU')->placeholder('DU/AU')->disableClear(),
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
            RelationManagers\TablesRelationManager::class,
            RelationManagers\InvitesRelationManager::class,



        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEvenements::route('/'),
            'create' => Pages\CreateEvenement::route('/create'),
            'edit' => Pages\EditEvenement::route('/{record}/edit'),
        ];
    }
}
