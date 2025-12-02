<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistribusiDagingSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('distribusi_daging')->insert([
            [
                'ID_Distribusi' => 1,
                'ID_Hewan' => 1,
                'ID_Penerima' => 1,
                'Tanggal_Distribusi' => '2026-06-28',
                'Penerima' => 'Budi Santoso',
                'Dokumentasi' => null,
                'Status_Distribusi' => 'Selesai',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
