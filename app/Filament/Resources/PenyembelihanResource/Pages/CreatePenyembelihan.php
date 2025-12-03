<?php

namespace App\Filament\Resources\PenyembelihanResource\Pages;

use Filament\Actions;
use App\Models\HewanKurban;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\PenyembelihanResource;

class CreatePenyembelihan extends CreateRecord
{
    protected static string $resource = PenyembelihanResource::class;

    // Setelah record dibuat
    protected function afterCreate(): void
    {
        $hewanId = $this->record->id_hewan; // ID Hewan yang baru dibuat

        // Update Status di tabel hewan_kurban
        HewanKurban::where('ID_Hewan', $hewanId)
            ->update(['Status' => 'Tersembelih']);
    }
}
