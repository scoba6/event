<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use App\Models\Customer;
use App\Models\Evenement;
use App\Models\Prestataire;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{
    use InteractsWithPageFilters;
    protected static ?int $sort = 0;
    public $startDate;
    public $endDate;

    protected function getStats(): array
    {



        $startDate = ! is_null($this->filters['startDate'] ?? null) ?
            Carbon::parse($this->filters['startDate']) :
            null;

        $endDate = ! is_null($this->filters['endDate'] ?? null) ?
            Carbon::parse($this->filters['endDate']) : now();

        $val = $this->filters['typevn'] ?? null;

        $clt = Customer::all()->whereBetween('created_at',[$startDate,$endDate])->count();
        $evt = Evenement::all()->where('typevn','=',$val)->whereBetween('created_at',[$startDate,$endDate])->count();
        $prs = Prestataire::all()->whereBetween('created_at',[$startDate,$endDate])->count();

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
