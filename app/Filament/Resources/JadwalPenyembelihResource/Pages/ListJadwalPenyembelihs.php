<?php

namespace App\Filament\Resources\JadwalPenyembelihResource\Pages;

use App\Filament\Resources\JadwalPenyembelihResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJadwalPenyembelihs extends ListRecords
{
    protected static string $resource = JadwalPenyembelihResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
