<?php

namespace App\Filament\Resources\HotesseResource\Pages;

use App\Filament\Resources\HotesseResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageHotesses extends ManageRecords
{
    protected static string $resource = HotesseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
