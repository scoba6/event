<?php

namespace App\Filament\Widgets;

use App\Models\Evenement;
use Carbon\Carbon;
use App\Models\Prestation;
use Filament\Tables\Columns\Summarizers\Sum;
use Flowframe\Trend\Trend;
use Filament\Widgets\Widget;
use Flowframe\Trend\TrendValue;
use Filament\Widgets\ChartWidget;

class StatTypeEvent extends ChartWidget
{
    //protected static string $view = 'filament.widgets.stat-type-event';


    protected static ?string $heading = 'Répartion par type de prestation';
    protected static ?int $sort = 2;
    protected static ?string $pollingInterval = '10s';
    protected static ?array $options = [
        'indexAxis'=> 'x',
    ];



    protected function getData(): array
    {
        $label = Prestation::pluck('libprs')->toArray();
        //$data = Trend::model(Prestation::class);
        $data  = Trend::query(Evenement::query()
            ->groupBy('typevn')
            ->orderBy('typevn')
        )
        ->between(
            start: now()->startOfYear(),
            end: now()->endOfYear(),
        )
        ->perYear()
        ->count();


        return [
            'datasets' => [
                [
                   'label' => 'Répartion par type de prestation',
                   'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                   // 'data' => $data,
                    'backgroundColor' =>[
                        'rgba(35, 99, 132, 0.2)',
                        'rgba(126, 159, 64, 0.2)',
                        'rgba(134, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)',
                        'rgba(890, 102, 255, 0.2)',
                        'rgba(876, 203, 207, 0.2)',
                        'rgba(654, 102, 255, 0.2)',
                        'rgba(129, 203, 207, 0.2)',
                        'rgba(120, 203, 207, 0.2)',
                    ],
                    'borderWidth' => 1
                ],
            ],
            'labels' =>  $label,

            //'labels' => ['Jan', 'Fev', 'Mar', 'Avr', 'Mai', 'Jun', 'Jui', 'Aou', 'Sep', 'Oct', 'Nov', 'Dec'],

        ];



    }

    protected function getType(): string
    {
        return 'bar';
    }
}
