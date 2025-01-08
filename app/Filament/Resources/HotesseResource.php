<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Hotesse;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Support\Enums\FontWeight;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;
use App\Filament\Resources\HotesseResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\HotesseResource\RelationManagers;

class HotesseResource extends Resource
{
    protected static ?string $model = Hotesse::class;
    protected ?string $maxContentWidth = 'full';
    protected static ?string $navigationGroup = 'PARAMETRES';
    protected static ?string $navigationLabel = 'Hotesses';
    protected static ?string $recordTitleAttribute = 'nomhot';
    protected static ?int $navigationSort = 3;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nomhot')->required()->label('NOM')->columnSpan('full')->unique(ignoreRecord: true),
                TextInput::make('telhot')->required()->label(label: 'TEL'),
                TextInput::make('maihot')->email()->label('MAIL'),
                FileUpload::make('imghot')->label('PHOTO')
                    ->image()
                    ->acceptedFileTypes(['image/*'])
                    ->disk('public')
                    ->directory('hotesses')
                    ->columnSpan('full'),
                Textarea::make('adrhot')->label('ADRESSE'),
                Textarea::make('deshot')->label('DESCRIPTION')
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                TextEntry::make('nomhot'),
                TextEntry::make('telhot'),
                TextEntry::make('description')
                    ->columnSpanFull(),
                ImageEntry::make('imghot'),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\Layout\Stack::make([
                    Tables\Columns\ImageColumn::make('imghot')
                        ->height('30%')
                        ->width('30%'),
                    Tables\Columns\Layout\Stack::make([
                        Tables\Columns\TextColumn::make('nomhot')
                            ->weight(FontWeight::Bold)
                            ->searchable(),
                        Tables\Columns\TextColumn::make('telhot')
                            ->searchable()
                    ]),
                ])->space(3),
                Tables\Columns\Layout\Panel::make([
                    Tables\Columns\Layout\Split::make([
                        Tables\Columns\ColorColumn::make('adrhot')
                            ->grow(false),
                        Tables\Columns\TextColumn::make('deshot')
                            ->color('gray'),
                    ]),
                ])->collapsible(),
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
            'index' => Pages\ManageHotesses::route('/'),
        ];
    }
}
