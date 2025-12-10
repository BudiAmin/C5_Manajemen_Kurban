<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            KetersediaanSeeder::class,
            DetailSeeder::class,
            // Tambahkan seeder lain jika ada di sini
        ]);
    }
}