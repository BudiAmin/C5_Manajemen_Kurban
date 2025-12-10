<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ketersediaan;
use Illuminate\Support\Facades\DB;

class KetersediaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Kosongkan tabel untuk menghindari duplikat saat seeding ulang
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Ketersediaan::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $hewan = [
            ['Jenis_Hewan' => 'Sapi', 'created_at' => now(), 'updated_at' => now()],
            ['Jenis_Hewan' => 'Kambing', 'created_at' => now(), 'updated_at' => now()],
            ['Jenis_Hewan' => 'Domba', 'created_at' => now(), 'updated_at' => now()],
        ];

        Ketersediaan::insert($hewan);
    }
}