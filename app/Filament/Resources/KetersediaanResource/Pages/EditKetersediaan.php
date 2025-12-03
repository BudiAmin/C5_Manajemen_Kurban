<?php

namespace App\Filament\Resources\KetersediaanResource\Pages;

use App\Filament\Resources\KetersediaanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKetersediaan extends EditRecord
{
    protected static string $resource = KetersediaanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
