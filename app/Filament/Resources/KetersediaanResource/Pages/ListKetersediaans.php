<?php

namespace App\Filament\Resources\KetersediaanResource\Pages;

use App\Filament\Resources\KetersediaanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKetersediaans extends ListRecords
{
    protected static string $resource = KetersediaanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
