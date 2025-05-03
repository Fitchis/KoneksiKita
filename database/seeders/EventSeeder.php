<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\User;
use Illuminate\Support\Carbon;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil user pertama (pastikan user sudah ada)
        $user = User::first();

        if (!$user) {
            $this->command->warn('Tidak ada user di database. Seeder Event tidak dijalankan.');
            return;
        }

        // Data event contoh
        $events = [
            [
                'title' => 'Seminar Nasional Kewirausahaan',
                'type' => 'Seminar',
                'date' => Carbon::now()->addDays(10)->toDateString(),
                'participant_estimate' => 300,
                'location' => 'Gedung Serbaguna ITS, Surabaya',
                'contact_name' => 'Andi Prasetyo',
                'contact_position' => 'Ketua Panitia',
                'contact_whatsapp' => '081234567890',
                'description' => 'Seminar nasional dengan pembicara dari berbagai startup lokal dan nasional untuk membahas kewirausahaan digital.',
                'poster' => 'https://via.placeholder.com/500x700?text=Poster+Event+1',
                'proposal' => 'https://drive.google.com/file/d/EXAMPLE_PROPOSAL_ID_1/view?usp=sharing',
            ],
            [
                'title' => 'Festival Budaya Nusantara',
                'type' => 'Festival',
                'date' => Carbon::now()->addDays(20)->toDateString(),
                'participant_estimate' => 500,
                'location' => 'Lapangan Kampus Telkom Surabaya',
                'contact_name' => 'Siti Nurhaliza',
                'contact_position' => 'Koordinator Acara',
                'contact_whatsapp' => '089876543210',
                'description' => 'Festival budaya untuk memperkenalkan kekayaan budaya Indonesia melalui pertunjukan seni, makanan tradisional, dan stand komunitas.',
                'poster' => 'https://via.placeholder.com/500x700?text=Poster+Event+2',
                'proposal' => 'https://drive.google.com/file/d/EXAMPLE_PROPOSAL_ID_2/view?usp=sharing',
            ],
        ];

        // Simpan ke database jika belum ada event dengan judul yang sama
        foreach ($events as $event) {
            Event::firstOrCreate(
                ['title' => $event['title']], // Cegah duplikat berdasarkan title
                array_merge($event, ['user_id' => $user->id])
            );
        }
    }
}
