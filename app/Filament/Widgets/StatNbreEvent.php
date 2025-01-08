<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use App\Models\Evenement;
use App\Models\Prestation;
use Flowframe\Trend\Trend;
use Filament\Widgets\Widget;
use Flowframe\Trend\TrendValue;
use Filament\Widgets\ChartWidget;

class StatNbreEvent extends ChartWidget
{
    //protected static string $view = 'filament.widgets.stat-nbre-event';
    protected static ?string $heading = 'Nombre d événements organisés par mois';
    protected static ?int $sort = 3;
    protected static ?string $pollingInterval = '10s';
    protected function getData(): array
    {


        $data = Trend::model(Evenement::class)
        ->between(
            start: now()->startOfYear(),
            end: now()->endOfYear(),
        )
        ->perMonth()
        ->count();

        return [
            'datasets' => [
                [
                    'label' => 'Nombre d événements organisés par mois',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                    'backgroundColor' => '#36A2EB',
                    'borderColor' => '#9BD0F5',
                ],
            ],
            //'labels' => $data->map(fn (TrendValue $value) => $value->date),
            'labels' => ['Jan', 'Fev', 'Mar', 'Avr', 'Mai', 'Jun', 'Jui', 'Aou', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

}
