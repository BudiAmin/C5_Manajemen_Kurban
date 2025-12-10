<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Detail;
use Illuminate\Support\Facades\DB;

class DetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Kosongkan tabel
        Detail::truncate();

        $details = [
            // Sapi, ID Ketersediaan = 1
            ['ID_Ketersediaan' => 1, 'Harga' => 21000000, 'created_at' => now(), 'updated_at' => now()],
            // Kambing, ID Ketersediaan = 2
            ['ID_Ketersediaan' => 2, 'Harga' => 3000000, 'created_at' => now(), 'updated_at' => now()],
            // Domba, ID Ketersediaan = 3
            ['ID_Ketersediaan' => 3, 'Harga' => 2500000, 'created_at' => now(), 'updated_at' => now()],
        ];

        Detail::insert($details);
    }
}