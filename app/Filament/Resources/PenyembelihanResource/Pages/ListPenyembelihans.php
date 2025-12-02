<?php

namespace App\Filament\Resources\PenyembelihanResource\Pages;

use App\Filament\Resources\PenyembelihanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPenyembelihans extends ListRecords
{
    protected static string $resource = PenyembelihanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
