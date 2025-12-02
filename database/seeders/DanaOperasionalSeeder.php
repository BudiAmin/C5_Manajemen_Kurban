<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DanaOperasionalSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('dana_operasional')->insert([
            [
                'ID_Operasional' => 1,
                'Keperluan' => 'Penyediaan Tenda & Alat Potong',
                'Jumlah_Pengeluaran' => 1500000,
                'Tanggal_Pengeluaran' => '2026-06-25',
                'Keterangan' => 'Biaya persiapan acara',
                'ID_DKM' => 1,
                'ID_User' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
