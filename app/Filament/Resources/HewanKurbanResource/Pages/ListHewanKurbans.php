<?php

namespace App\Filament\Resources\HewanKurbanResource\Pages;

use App\Filament\Resources\HewanKurbanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHewanKurbans extends ListRecords
{
    protected static string $resource = HewanKurbanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
