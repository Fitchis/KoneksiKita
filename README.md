# KoneksiKita 🌐

**KoneksiKita** adalah platform yang dirancang untuk menghubungkan pengguna dengan layanan atau informasi secara efisien dan intuitif. Website ini menampilkan informasi dengan antarmuka yang bersih dan ramah pengguna, serta didukung dengan sistem backend yang handal.

## 🔗 Live Site

🟢 [https://koneksikita.site](https://koneksikita.site)

## 🧩 Fitur Utama

- 📋 Halaman utama informatif dan cepat diakses
- 📆 Kalender interaktif untuk melihat jadwal
- 🔐 Sistem login khusus admin
- 📊 Tampilan tabel booking/jadwal yang dinamis
- 📁 Upload dan pengelolaan dokumen (jika ada)
- 🧑‍💼 Role pengguna (Admin, Mahasiswa, Perusahaan, dll.)

## ⚙️ Teknologi yang Digunakan

- **Laravel** – Framework PHP untuk backend dan routing
- **Laravel Breeze** – Autentikasi ringan dan sederhana
- **Blade Templating** – Untuk tampilan frontend
- **Tailwind CSS** – Styling modern berbasis utility-first
- **MySQL** – Penyimpanan data dan manajemen jadwal
- **JavaScript** – Untuk interaksi dinamis (termasuk kalender)
- **Vite/Laravel Mix** – Untuk kompilasi aset frontend

## 🗂️ Struktur Proyek

bash
├── app/                 # File logic Laravel
├── database/            # Seeder, migration, dan model
├── public/              # Aset publik (gambar, JS, poster)
├── resources/
│   ├── views/           # Blade templates (welcome, dashboard, dll.)
│   └── js/css           # Frontend logic (kalender, form, dll.)
├── routes/web.php       # Routing utama
├── storage/             # Upload proposal atau dokumen
└── .env                 # Konfigurasi lingkungan

🚀 Menjalankan Secara Lokal
Clone repo:

git clone https://github.com/Fitchis/koneksikita.git
cd koneksikita

Install dependensi:

composer install
npm install

Setup .env:
cp .env.example .env
php artisan key:generate

Jalankan server:

php artisan migrate --seed
php artisan serve
npm run dev


🛡️ Hak Akses
Role	Akses
Admin	CRUD jadwal, unggah proposal, dsb.
Mahasiswa	Lihat info & upload dokumen (ops.)
Perusahaan	Lihat jadwal atau event

📬 Kontak
Jika ada pertanyaan, silakan hubungi:

🌐 Website: koneksikita.site

📧 Email: info@koneksikita.site

