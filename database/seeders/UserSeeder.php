<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Superadmin
        User::create([
            'name' => 'Mincuan',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'superadmin',
        ]);

        // Perusahaan
        User::create([
            'name' => 'PT Sponsor Hebat',
            'email' => 'sponsor@example.com',
            'password' => Hash::make('password'),
            'role' => 'perusahaan',
        ]);

        // Mahasiswa
        User::create([
            'name' => 'Andi Mahasiswa',
            'email' => 'mahasiswa@example.com',
            'password' => Hash::make('password'),
            'role' => 'mahasiswa',
        ]);
    }
}
