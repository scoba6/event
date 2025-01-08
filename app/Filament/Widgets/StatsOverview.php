<?php

namespace App\Filament\Widgets;

use App\Models\Customer;
use App\Models\Evenement;
use App\Models\Prestataire;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {

        $clt = Customer::all()->count();
        $evt = Evenement::all()->count();
        $prs = Prestataire::all()->count();

        return [
            Stat::make('CLIENTS', $clt)
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
            Stat::make('EVENEMENTS', $evt)
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->chart([17, 16, 14, 15, 14, 13, 12])
                ->color('success'),
            Stat::make('PRESTATAIRES',  $prs)
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([15, 4, 10, 2, 12, 4, 12])
                ->color('success'),
        ];
    }
}
