<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DanaDKMSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('dana_dkm')->insert([
            [
                'ID_DKM' => 1,
                'Sumber_dana' => 'Donatur Masjid',
                'Jumlah_dana' => 5000000,
                'Tanggal_masuk' => '2026-06-20',
                'Keterangan' => 'Dana awal persiapan kurban',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
