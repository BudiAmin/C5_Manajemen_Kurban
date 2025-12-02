<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenerimaKurbanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('penerima_kurban')->insert([
            [
                'ID_Penerima' => 1,
                'Nama' => 'Budi Santoso',
                'Tempat_Tinggal' => 'JL Kenanga No. 12',
                'Tanggal_Terima' => '2026-06-28',
                'ID_User' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
