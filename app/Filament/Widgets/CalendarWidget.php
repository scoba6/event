<?php

namespace App\Filament\Widgets;

use App\Models\Customer;
use App\Models\Evenement;
use App\Models\Prestation;
use Filament\Widgets\Widget;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;
use App\Filament\Resources\EvenementResource;
use Saade\FilamentFullCalendar\Data\EventData;
use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;

class CalendarWidget extends FullCalendarWidget
{
    //protected static string $view = 'filament.widgets.calendar-widget';
    protected static ?int $sort = 5;
    public Model | string | null $model = Evenement::class;

    public function fetchEvents(array $fetchInfo): array
    {

            return Evenement::query()
                ->where('strevn', '>=', $fetchInfo['start'])
                ->where('endevn', '<=', $fetchInfo['end'])
                ->get()
                ->map(
                    fn (Evenement $event) => EventData::make()
                        ->id($event->id)
                        ->title($event->libevn)
                        ->start($event->strevn)
                        ->end($event->endevn)
                     /* ->url(
                            url: EvenementResource::getUrl(name: 'view', parameters: ['record' => $event]),
                            shouldOpenUrlInNewTab: true
                        ) */
                )->toArray();
    }

    public function getFormSchema(): array
    {
        return [
            TextInput::make('libevn')->required()->label('LIBELLE')->columnSpan('full')->unique(ignoreRecord: true),
                Select::make('customer_id')->label('CLIENT')
                    ->options(Customer::all()->pluck('nomcli', 'id')->toArray())
                    ->searchable()
                    ->required(),
                Select::make('typevn')->label('TYPE')->options(Prestation::all()->pluck('libprs', 'id')->toArray())
                    ->required()
                    ->searchable(),
                DatePicker::make('strevn')->label('DU')->required(),
                DatePicker::make('endevn')->label('AU')
                    //->maxDate(now())
                    ->required(),
                RichEditor::make('desevn')->label('DESCRIPTION')->columnSpan('full'),

        ];
    }


}
