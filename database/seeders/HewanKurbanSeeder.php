<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HewanKurbanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('hewan_kurban')->insert([
            [
                'ID_Hewan' => 1,
                'ID_Jadwal' => 1,
                'Jenis_Hewan' => 'Sapi',
                'Status_Hewan' => 'Siap',
                'ID_User' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
