<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'ID_User' => 1,
                'name' => 'Admin Kurban',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'role' => 'admin_kurban',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ID_User' => 2,
                'name' => 'Peserta Kurban',
                'email' => 'peserta@example.com',
                'password' => Hash::make('password'),
                'role' => 'peserta_kurban',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
