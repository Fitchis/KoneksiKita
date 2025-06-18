<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Koneksi Kita - Kolaborasi Sponsorship & Mahasiswa</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" href="/images/LogoFix.png" type="image/png">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet" />
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap"
        as="style" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "url": "https://koneksikita.site",
  "logo": "https://koneksikita.site/logo.png"
}
</script>

    <style>
        body {
            font-family: "Poppins", sans-serif;
        }

        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body class="bg-[#EEEDED]">
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
                {{ $pageTitle ?? 'Event' }}
            </span>
        </nav>
    </div>

    <!-- Header Section -->
    <div class="max-w-5xl mx-auto flex flex-col sm:flex-row sm:items-center sm:justify-between px-6 mb-8">
        <div class="bg-[#ffffff] rounded-3xl p-4 sm:p-6 max-w-3xl flex-1">
            <h2 class="font-semibold text-sm sm:text-base mb-2 text-[#496538] leading-tight">
                Selamat datang di Papan Acara (EO)
            </h2>
            <p class="text-xs sm:text-sm text-black leading-snug">
                Dengan meluangkan beberapa menit untuk memposting acara atau peluang Anda di pitch board, Anda membuka
                saluran tambahan yang unik untuk terhubung dengan brand. Mengapa pemasar merek menggunakan Pitch Board?
                Mengapa acara dan properti menggunakan Pitch Board?
            </p>
        </div>
        @auth
            @if (auth()->user()->role === 'superadmin' || auth()->user()->role === 'mahasiswa')
                <a href="{{ route('katalog.add-event') }}">
                    <button
                        class="mt-2 sm:mt-0 sm:ml-2 flex flex-col items-center justify-center bg-white rounded-lg shadow-md w-20 h-20 sm:w-24 sm:h-24 text-[#4B5335] font-bold text-xs sm:text-sm"
                        type="button">
                        <div class="bg-[#E6EFC2] rounded-full w-8 h-8 flex items-center justify-center mb-1 sm:mb-2">
                            <i class="fas fa-plus text-lg sm:text-xl"></i>
                        </div>
                        Tambah Event
                    </button>
                </a>
            @endif
        @endauth

    </div>

    <!-- Upcoming Events Section -->
    @if (request('search'))
        <!-- 🔍 Hasil Pencarian -->
        <section class="pt-6 px-6 min-h-screen">
            <div class="max-w-5xl mx-auto">
                <h1 class="text-2xl font-bold text-[#496538] mb-4">Hasil pencarian untuk: "{{ request('search') }}"</h1>
                <a href="{{ route('katalog.event') }}"
                    class="inline-flex items-center gap-2 mb-4 text-sm text-white bg-[#496538] px-4 py-2 rounded-full hover:bg-[#3a4e2b] transition">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
                @if ($otherEvents->count())
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($otherEvents as $event)
                            @include('components.event-card', ['event' => $event])
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="mt-8 flex justify-center">
                        {{ $otherEvents->withQueryString()->links('vendor.pagination.tailwind') }}
                    </div>
                @else
                    <p class="text-gray-600 text-sm">Tidak ada hasil ditemukan untuk pencarian tersebut.</p>
                @endif
            </div>
        </section>
    @else
        <!-- ✅ Tampilan Normal -->
        <section class="pt-6 px-6 ">
            <div class="max-w-5xl mx-auto">
                <h1 class="text-3xl font-bold text-[#496538] mb-8 text-start">Event yang akan datang</h1>
                @foreach ($events as $month => $eventGroup)
                    <div class="mb-10">
                        <h3 class="text-lg sm:text-xl font-bold text-[#4B5335] mb-4 border-b pb-2 border-[#C8D6B9]">
                            Tahun {{ $month }}
                        </h3>
                        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach ($eventGroup as $event)
                                @include('components.event-card', ['event' => $event])
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <section class="pt-10 px-6">
            <div class="max-w-5xl mx-auto">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-[#496538]">Event Lainnya</h2>

                    <form action="{{ route('katalog.event') }}" method="GET" class="relative">
                        <input type="text" name="search" placeholder="Search Events" value="{{ request('search') }}"
                            class="pl-4 pr-10 py-2 text-sm rounded-full border border-gray-300 focus:outline-none focus:ring focus:ring-green-200">
                        <button type="submit"
                            class="absolute right-2 top-1/2 transform -translate-y-1/2 text-[#4B5335]">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>

                @foreach ($otherEvents as $month => $eventGroup)
                    <div class="mb-10">
                        <h3 class="text-lg sm:text-xl font-bold text-[#4B5335] mb-4 border-b pb-2 border-[#C8D6B9]">
                            Tahun {{ $month }}
                        </h3>
                        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-4">

                            @foreach ($eventGroup as $event)
                                @include('components.event-card', ['event' => $event])
                            @endforeach
                        </div>
                    </div>
                @endforeach


                <!-- Pagination -->
                <div class="mt-8 flex justify-center">
                    {{ $otherEvents->links('vendor.pagination.tailwind') }}
                </div>
            </div>
        </section>
    @endif

    <x-footer />

    <script>
        function closePopup() {
            document.getElementById('popup').remove();
        }
    </script>
</body>

</html>
