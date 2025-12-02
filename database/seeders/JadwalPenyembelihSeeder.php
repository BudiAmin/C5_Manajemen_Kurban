<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JadwalPenyembelihSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('jadwal_penyembelih')->insert([
            [
                'ID_Jadwal' => 1,
                'Foto_Dokumentasi' => null,
                'Nama_Penyembelih' => 'Ustadz Ahmad',
                'Waktu_Penyembelih' => '2026-06-28 08:00:00',
                'Lokasi_Penyembelih' => 'Lapangan Masjid',
                'ID_Operasional' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
