<?php

namespace App\Filament\Resources\PelaksanaanResource\Pages;

use App\Filament\Resources\PelaksanaanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPelaksanaan extends EditRecord
{
    protected static string $resource = PelaksanaanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
