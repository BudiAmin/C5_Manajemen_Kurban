<?php

namespace App\Filament\Resources\PelaksanaanResource\Pages;

use App\Filament\Resources\PelaksanaanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPelaksanaans extends ListRecords
{
    protected static string $resource = PelaksanaanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
