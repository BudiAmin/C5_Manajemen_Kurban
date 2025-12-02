<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UsersSeeder::class,
            DanaDKMSeeder::class,
            DanaOperasionalSeeder::class,
            JadwalPenyembelihSeeder::class,
            HewanKurbanSeeder::class,
            PenerimaKurbanSeeder::class,
            DistribusiDagingSeeder::class,
        ]);
    }
}
