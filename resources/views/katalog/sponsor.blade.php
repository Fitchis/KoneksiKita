<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Koneksi Kita - Kolaborasi Sponsorship & Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet" />
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap"
        as="style" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <style>
        body {
            font-family: "Poppins", sans-serif;
        }

        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body class="bg-[#F5F5DC]">
    @include('components.navbar')
    <!-- Breadcrumb -->
    <div class="max-w-5xl mx-auto px-6 pt-10">
        <nav class="flex items-center gap-1 text-xs sm:text-sm font-semibold text-[#4B5335] mb-6 select-none">
            <a href="{{ route('welcome') }}" class="inline-flex items-center gap-1 hover:underline">
                <i class="fas fa-home text-[10px]"></i>
                Beranda
            </a>
            <span>›</span>
            <a href="{{ route('papan-acara') }}" class="inline-flex items-center gap-1 hover:underline">
                Event Board
            </a>
            <span>›</span>
            <span class="font-bold">
                {{ $pageTitle ?? 'Sponsor' }}
            </span>
        </nav>
    </div>


    <!-- Header Section -->
    <div class="max-w-5xl mx-auto flex flex-col sm:flex-row sm:items-center sm:justify-between px-6 mb-8">
        <div class="bg-[#ffffff] rounded-3xl p-4 sm:p-6 max-w-3xl flex-1">
            <h2 class="font-semibold text-sm sm:text-base mb-2 text-[#496538] leading-tight">
                Selamat datang di Papan Acara (SPONSOR)
            </h2>
            <p class="text-xs sm:text-sm text-[#85BB65] leading-snug">
                Dengan meluangkan beberapa menit untuk memposting acara atau peluang Anda di pitch board, Anda membuka
                saluran tambahan yang unik untuk terhubung dengan brand. Mengapa pemasar merek menggunakan Pitch Board?
                Mengapa acara dan properti menggunakan Pitch Board?
            </p>
        </div>

        @if (Auth::check() && (Auth::user()->role === 'perusahaan' || Auth::user()->role === 'superadmin'))
            <a href="{{ route('katalog.add-sponsor') }}">
                <button
                    class="mt-2 sm:mt-0 sm:ml-2 flex flex-col items-center justify-center bg-white rounded-lg shadow-md w-20 h-20 sm:w-24 sm:h-24 text-[#4B5335] font-bold text-xs sm:text-sm"
                    type="button">
                    <div class="bg-[#E6EFC2] rounded-full w-8 h-8 flex items-center justify-center mb-1 sm:mb-2">
                        <i class="fas fa-plus text-lg sm:text-xl"></i>
                    </div>
                    Tambah Sponsor
                </button>
            </a>
        @else
            <!-- Popup -->
            <div id="popup" class="fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-50 z-50">
                <div class="bg-white p-6 rounded-lg shadow-md max-w-md w-full">
                    <h3 class="text-xl font-semibold text-[#4B5335]">Info</h3>
                    <p class="text-sm text-gray-600 mt-2">
                        Anda harus login sebagai perusahaan atau superadmin untuk dapat menambahkan sponsor. <br>
                        Silakan login terlebih dahulu.
                    </p>
                    <div class="mt-4 flex justify-end">
                        <a href="{{ route('login') }}">
                            <button class="bg-[#85BB65] text-white px-4 py-2 rounded-lg">
                                Login
                            </button>
                        </a>
                        <button onclick="closePopup()" class="ml-4 text-gray-500">
                            Tutup
                        </button>
                    </div>
                </div>
            </div>
        @endif


    </div>

    <!-- Sponsor Info Section -->
    <section class="pt-6 px-6 min-h-screen">
        <div class="max-w-6xl mx-auto">
            <h1 class="text-3xl font-bold text-[#496538] mb-8 text-start">Informasi Sponsor</h1>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($sponsors as $sponsor)
                    <div
                        class="bg-white rounded-3xl shadow-lg p-6 flex flex-col hover:shadow-xl transition-shadow duration-300 ease-in-out">

                        <!-- Logo sponsor (Gambar penuh di atas card) -->
                        <img src="{{ $sponsor->logo ? (Str::startsWith($sponsor->logo, 'http') ? $sponsor->logo : asset('sponsor_logos/' . $sponsor->logo)) : 'https://via.placeholder.com/400x200?text=Brand' }}"
                            alt="{{ $sponsor->name }}" class="rounded-t-lg w-full h-48 object-contain bg-gray-100" />


                        <!-- Nama sponsor -->
                        <h2 class="text-xl font-semibold text-[#0a3a0d] mb-2 truncate hover:text-[#4B5335]">
                            {{ $sponsor->name }}
                        </h2>

                        <!-- Deskripsi singkat -->
                        <p class="text-gray-700 text-sm mb-2 flex-1">
                            {{ Str::limit($sponsor->description, 100) }}
                        </p>

                        <!-- Jenis perusahaan dan lokasi -->
                        <div class="flex justify-between items-center text-sm text-gray-600 mt-2 mb-4">
                            <!-- Jenis perusahaan -->
                            <p class="flex items-center space-x-2">
                                <i class="fas fa-briefcase text-[#4B5335]"></i>
                                <span>{{ $sponsor->company_type ?? 'Tidak diketahui' }}</span>
                            </p>

                            <!-- Lokasi -->
                            <p class="flex items-center space-x-2">
                                <i class="fas fa-map-marker-alt text-[#4B5335]"></i>
                                <span>{{ $sponsor->location ?? '–' }}</span>
                            </p>
                        </div>

                        <!-- Tombol atau link untuk detail -->
                        <a href="{{ route('sponsor.show', $sponsor->id) }}"
                            class="text-green-700 font-semibold mt-auto inline-block hover:text-green-500 transition-colors duration-200">
                            Lihat Detail &rarr;
                        </a>
                    </div>
                @endforeach
            </div>

        </div>
    </section>



    <script>
        function closePopup() {
            document.getElementById('popup').remove();
        }
    </script>
</body>

</html>
