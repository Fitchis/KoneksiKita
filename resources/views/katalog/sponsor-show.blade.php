<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ $sponsor->name }} - Detail Sponsor</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
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

<body class="bg-[#EEEDED]">
    @include('components.navbar')

    <!-- Breadcrumb -->
    <div class="max-w-5xl mx-auto px-6 pt-10">
        <nav class="flex items-center gap-1 text-xs sm:text-sm font-semibold text-[#4B5335] mb-6 select-none">
            <a href="{{ route('welcome') }}" class="inline-flex items-center gap-1 hover:underline">
                <i class="fas fa-home text-[10px]"></i> Beranda
            </a>
            <span>›</span>
            <a href="{{ route('katalog.sponsor') }}" class="inline-flex items-center gap-1 hover:underline">
                Sponsor
            </a>
            <span>›</span>
            <span class="font-bold text-start">{{ $sponsor->name }}</span>
        </nav>
    </div>

    <!-- Sponsor Detail Section -->
    <section class="max-w-6xl mx-auto px-6 py-10 space-y-12">
        <!-- Nama Sponsor -->
        <h2 class="text-3xl font-bold text-[#4B5335] items-start text-start">{{ $sponsor->name }}</h2>

        <!-- Gambar + Kontak -->
        <div class="grid md:grid-cols-3 gap-8 items-start">
            <!-- Gambar Sponsor -->
            <div class="md:col-span-2 flex justify-center">
                <img src="{{ $sponsor->logo ? asset('sponsor_logos/' . $sponsor->logo) : 'https://via.placeholder.com/800x400' }}"
                    alt="{{ $sponsor->name }}" class="w-3/4 max-w-md h-auto rounded-xl shadow-md">
            </div>


            <!-- Bagikan Event + Kontak -->
            <div class="space-y-6">
                <!-- Bagikan Event -->
                <div class="bg-white p-6 rounded-xl shadow-md">
                    <h3 class="text-lg font-semibold text-[#4B5335] mb-4 text-center">Bagikan Event</h3>
                    <div class="flex flex-col gap-4">
                        <a href="#" class="flex items-center gap-2 text-gray-700 hover:underline">
                            <i class="fab fa-linkedin text-[#0e76a8]"></i> Share on LinkedIn
                        </a>
                        <a href="#" class="flex items-center gap-2 text-gray-700 hover:underline">
                            <i class="fab fa-facebook text-[#3b5998]"></i> Share on Facebook
                        </a>
                        <a href="#" class="flex items-center gap-2 text-gray-700 hover:underline">
                            <i class="fas fa-link text-[#4B5335]"></i> Copy Link
                        </a>
                    </div>
                </div>

                <!-- Kontak -->
                <div class="bg-white p-6 rounded-xl shadow-md">
                    <h3 class="text-lg font-semibold text-[#4B5335] mb-4 text-center">Kontak</h3>
                    <div class="space-y-4 text-gray-700 text-center">
                        @if ($sponsor->email)
                            <div class="flex items-center justify-center gap-2">
                                <i class="fas fa-envelope text-[#4B5335]"></i> {{ $sponsor->email }}
                            </div>
                        @endif
                        @if ($sponsor->phone)
                            <div class="flex items-center justify-center gap-2">
                                <i class="fas fa-phone text-[#4B5335]"></i> {{ $sponsor->phone }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Tentang Perusahaan -->
        <div class="bg-white p-6 rounded-xl shadow-md">
            <h3 class="text-lg font-bold text-[#4B5335] mb-4">Tentang Perusahaan</h3>
            <p class="text-gray-700 leading-relaxed">
                {!! nl2br(e($sponsor->description)) !!}
            </p>
        </div>

        <!-- Lokasi -->
        <div class="rounded-2xl overflow-hidden">
            <iframe src="https://maps.google.com/maps?q={{ urlencode($sponsor->location) }}&output=embed"
                class="w-full h-64 rounded-2xl border-0" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>

        {{-- <!-- Tombol Edit Info Brand -->
        <div class="flex justify-center">
            <a href="{{ route('sponsor.edit', $sponsor->id) }}"
                class="bg-[#004225] hover:bg-green-700 text-white font-semibold py-2 px-6 rounded-full flex items-center gap-2">
                <i class="fas fa-edit"></i> Edit Info Brand
            </a>
        </div> --}}
    </section>

    @include('components.footer')
</body>

</html>
