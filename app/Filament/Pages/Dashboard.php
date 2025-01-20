<?php

namespace App\Filament\Pages;

use App\Models\Prestation;
use Filament\Pages\Page;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    //protected static ?string $navigationIcon = 'heroicon-o-document-text';

    //protected static string $view = 'filament.pages.dashboard';
    use BaseDashboard\Concerns\HasFiltersForm;
    public function filtersForm(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        Select::make('typevn')->options(Prestation::all()->pluck('libprs', 'id'))
                            ->label('PRESTATION')
                            ->required(),
                        DatePicker::make('startDate')
                            ->label('DU')
                            ->maxDate(fn (Get $get) => $get('endDate') ?: now()),
                        DatePicker::make(name: 'endDate')
                            ->label('AU')
                            ->minDate(fn (Get $get) => $get('startDate') ?: now())
                            ->maxDate(now()),
                    ])
                    ->columns(3),
            ]);
    }
}
