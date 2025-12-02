<?php

namespace App\Filament\Resources\JadwalPenyembelihResource\Pages;

use App\Filament\Resources\JadwalPenyembelihResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJadwalPenyembelih extends EditRecord
{
    protected static string $resource = JadwalPenyembelihResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
