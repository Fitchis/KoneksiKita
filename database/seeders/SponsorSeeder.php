<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class SponsorSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first(); // ambil user pertama yang ada

        if (!$user) {
            // Jika tidak ada user, buat dummy user dulu
            $user = User::factory()->create([
                'name' => 'Admin Dummy',
                'email' => 'admin@example.com',
            ]);
        }

        $sponsors = [
            [
                'name' => 'Kustompedia',
                'description' => 'Platform pemasaran digital yang menyediakan solusi branding dan promosi acara secara online.',
                'logo' => 'https://via.placeholder.com/400x200?text=Kustompedia',
                'company_type' => 'Digital Marketing',
                'location' => 'Surabaya',
                'email' => 'kustompedia@email.com',
                'phone' => '081234567890',
            ],
            [
                'name' => 'EventIn',
                'description' => 'Perusahaan penyedia layanan event management dengan jaringan luas di seluruh Indonesia.',
                'logo' => 'https://via.placeholder.com/400x200?text=EventIn',
                'company_type' => 'Event Organizer',
                'location' => 'Jakarta',
                'email' => 'info@eventin.co.id',
                'phone' => '082112345678',
            ],
            [
                'name' => 'Kreativa.ID',
                'description' => 'Agensi kreatif yang berfokus pada branding, konten digital, dan strategi media sosial.',
                'logo' => 'https://via.placeholder.com/400x200?text=Kreativa.ID',
                'company_type' => 'Creative Agency',
                'location' => 'Bandung',
                'email' => 'halo@kreativa.id',
                'phone' => '08991234567',
            ],
        ];

        foreach ($sponsors as $sponsor) {
            DB::table('sponsors')->insert([
                'user_id' => $user->id,
                'name' => $sponsor['name'],
                'description' => $sponsor['description'],
                'logo' => $sponsor['logo'],
                'company_type' => $sponsor['company_type'],
                'location' => $sponsor['location'],
                'email' => $sponsor['email'],
                'phone' => $sponsor['phone'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
