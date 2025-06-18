<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Koneksi Kita - Kolaborasi Sponsorship & Mahasiswa</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" href="/images/LogoFix.png" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet" />
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap"
        as="style">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
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

<body>

    @include('components.navbar')

    {{-- Section: Tentang kami --}}
    <section class="relative py-20 bg-cover bg-center"
        style="background-image: url('{{ asset('images/carakerjabg.png') }}')">
        <div class="absolute inset-0 bg-[#EEEDED]/60"></div>

        <!-- Gradient bottom untuk transisi ke section bawah -->
        <div class="absolute bottom-0 left-0 w-full h-32 
         bg-gradient-to-b from-transparent to-[#EEEDED]">
        </div>

        <div class="relative z-10 max-w-xl mx-auto px-6 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-[#004225] mb-4">
                Tentang KoneksiKita
            </h2>
            <p class="text-[#004225]/90 mb-8">
                Menghubungkan penyelenggara acara dan perusahaan untuk menciptakan kolaborasi yang bermanfaat bagi semua
                pihak.
            </p>
            @guest
                <a href="{{ route('register') }}"
                    class="inline-block px-8 py-3 bg-[#004225] text-white rounded-full hover:bg-[#004225c9] transition">
                    Daftar Sekarang!
                </a>
            @endguest

        </div>
    </section>

    {{-- Section: Eventboard --}}
    <section class="py-20 bg-[#EEEDED]">
        <div class="max-w-5xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 items-center gap-12">
            <!-- Kiri: Deskripsi -->
            <div class="text-left">
                <h3 class="text-2xl font-bold text-[#85BB65] mb-4">Misi & Visi</h3>
                <h3 class="text-2xl font-bold text-green-900 mb-4">Misi</h3>
                <p class="text-gray-700 mb-4 leading-relaxed">
                    Menyediakan platform yang memudahkan penyelenggara acara untuk mendapatkan sponsor yang tepat, serta
                    membantu perusahaan menemukan peluang sponsorship yang sesuai dengan target pasar dan nilai-nilai
                    mereka.
                </p>
                <h3 class="text-2xl font-bold text-green-900 mb-4">Visi</h3>
                <p class="text-gray-700 leading-relaxed">
                    Menjadi platform terdepan dalam ekosistem sponsorship di Indonesia, menciptakan hubungan yang saling
                    menguntungkan antara penyelenggara acara dan perusahaan sponsor untuk mendorong pertumbuhan industri
                    event dan bisnis.
                </p>
            </div>

            <!-- Kanan: Gambar -->
            <div class="flex justify-center">
                <img src="{{ asset('images/ebdImg.png') }}" alt="Eventboard Illustration"
                    class="w-full max-w-md rounded-2xl shadow-lg object-cover">
            </div>
        </div>
    </section>
    {{-- Section: Connect (Gambar Kiri, Deskripsi Kanan) --}}
    <section class="py-20 bg-[#EEEDED]">
        <div class="max-w-6xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 items-center gap-12">
            <!-- Kiri: Gambar -->
            <div class="flex justify-center">
                <img src="{{ asset('images/cImg.png') }}" alt="Connect Illustration"
                    class="w-full max-w-lg rounded-2xl shadow-lg object-cover">
            </div>

            <!-- Kanan: Deskripsi -->
            <div class="text-right">
                <h3 class="text-3xl font-bold text-green-900 mb-4">Cara Kerja Kami</h3>
                <p class="text-gray-700 mb-6 leading-relaxed">
                    <strong>SponsorConnect</strong> menyediakan solusi end-to-end untuk kebutuhan sponsorship Anda.
                </p>

                <div class="space-y-8">
                    <!-- Step 1 -->
                    <div class="flex items-start gap-4 justify-end">
                        <div>
                            <h4 class="text-lg font-semibold text-green-900 mb-1">Koneksi yang Tepat</h4>
                            <p class="text-gray-700 leading-relaxed">
                                Kami menghubungkan penyelenggara acara dengan perusahaan yang memiliki target pasar dan
                                nilai yang selaras.
                            </p>
                        </div>
                        <div
                            class="flex items-center justify-center w-8 h-8 rounded-full bg-green-200 text-green-800 font-bold text-sm flex-shrink-0">
                            1
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="flex items-start gap-4 justify-end">
                        <div>
                            <h4 class="text-lg font-semibold text-green-900 mb-1">Proses yang Efisien</h4>
                            <p class="text-gray-700 leading-relaxed">
                                Platform kami menyederhanakan proses negosiasi dan administrasi sponsorship.
                            </p>
                        </div>
                        <div
                            class="flex items-center justify-center w-8 h-8 rounded-full bg-green-200 text-green-800 font-bold text-sm flex-shrink-0">
                            2
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="flex items-start gap-4 justify-end">
                        <div>
                            <h4 class="text-lg font-semibold text-green-900 mb-1">Sinergi yang Kuat</h4>
                            <p class="text-gray-700 leading-relaxed">
                                Kami membangun kemitraan yang harmonis antara brand dan acara, menciptakan nilai
                                bersama.
                            </p>
                        </div>
                        <div
                            class="flex items-center justify-center w-8 h-8 rounded-full bg-green-200 text-green-800 font-bold text-sm flex-shrink-0">
                            3
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Komitmen -->
    <section class="bg-[#f9f9f1] py-16 px-6">
        <div class="max-w-6xl mx-auto">
            <!-- Header -->
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                    Komitmen Kami
                </h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Prinsip yang memandu kami dalam membangun SponsorConnect.
                </p>
            </div>

            <!-- Grid Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                <!-- Card 1: Kolaborasi -->
                <div class="bg-white rounded-xl p-8 shadow-sm hover:shadow-lg transition-shadow duration-300">
                    <div class="flex flex-col items-center text-center">
                        <!-- Icon -->
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mb-6">
                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                        </div>
                        <!-- Content -->
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Kolaborasi</h3>
                        <p class="text-gray-600 leading-relaxed">
                            Kami percaya bahwa kerjasama yang baik akan menghasilkan manfaat bagi semua pihak.
                        </p>
                    </div>
                </div>

                <!-- Card 2: Integritas -->
                <div class="bg-white rounded-xl p-8 shadow-sm hover:shadow-lg transition-shadow duration-300">
                    <div class="flex flex-col items-center text-center">
                        <!-- Icon -->
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mb-6">
                            <svg class="w-8 h-8 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />
                            </svg>
                        </div>

                        <!-- Content -->
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Integritas</h3>
                        <p class="text-gray-600 leading-relaxed">
                            Kami menjunjung tinggi kejujuran dan transparansi dalam setiap aspek bisnis kami.
                        </p>
                    </div>
                </div>

                <!-- Card 3: Inovasi -->
                <div class="bg-white rounded-xl p-8 shadow-sm hover:shadow-lg transition-shadow duration-300">
                    <div class="flex flex-col items-center text-center">
                        <!-- Icon -->
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mb-6">
                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z">
                                </path>
                            </svg>
                        </div>
                        <!-- Content -->
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Inovasi</h3>
                        <p class="text-gray-600 leading-relaxed">
                            Kami terus berinovasi untuk memberikan solusi terbaik bagi pengguna kami.
                        </p>
                    </div>
                </div>

                <!-- Card 4: Aksesibilitas -->
                <div class="bg-white rounded-xl p-8 shadow-sm hover:shadow-lg transition-shadow duration-300">
                    <div class="flex flex-col items-center text-center">
                        <!-- Icon -->
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mb-6">
                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <!-- Content -->
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Aksesibilitas</h3>
                        <p class="text-gray-600 leading-relaxed">
                            Kami berkomitmen untuk membuat sponsorship dapat diakses oleh semua kalangan.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pengembang -->
    <section class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-2">Tim Keren di Balik Layar Website Ini</h2>
            <p class="text-sm sm:text-base text-gray-600 mb-8">
                Kenalin nih, para pahlawan digital yang bikin website ini jadi nyata!<br />
                Mereka kerja bareng demi pengalaman terbaik buat kamu!
            </p>

            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4 sm:gap-6">
                <!-- Card 1 -->
                <div class="bg-white rounded-xl shadow p-3 sm:p-4 transition hover:-translate-y-2 hover:shadow-lg duration-300"
                    data-aos="fade-up">
                    <img src="/images/Luthfi.png" alt="Andi Luthfi"
                        class="w-full aspect-[3/4] object-cover rounded-lg mb-2 transition duration-300 hover:scale-105">
                    <h3 class="text-sm sm:text-base font-semibold">Andi Luthfi M. A. A</h3>
                    <p class="text-xs sm:text-sm text-gray-500">Web Developer</p>
                </div>

                <!-- Card 2 -->
                <div class="bg-white rounded-xl shadow p-3 sm:p-4 transition hover:-translate-y-2 hover:shadow-lg duration-300"
                    data-aos="fade-up" data-aos-delay="100">
                    <img src="/images/Nada.png" alt="Qothrunnada"
                        class="w-full aspect-[3/4] object-cover rounded-lg mb-2 transition duration-300 hover:scale-105">
                    <h3 class="text-sm sm:text-base font-semibold">Qothrunnada Nahdah</h3>
                    <p class="text-xs sm:text-sm text-gray-500">Social Media Manager</p>
                </div>

                <!-- Card 3 -->
                <div class="bg-white rounded-xl shadow p-3 sm:p-4 transition hover:-translate-y-2 hover:shadow-lg duration-300"
                    data-aos="fade-up" data-aos-delay="200">
                    <img src="/images/Dinda.jpg" alt="Adinda"
                        class="w-full aspect-[3/4] object-cover rounded-lg mb-2 transition duration-300 hover:scale-105">
                    <h3 class="text-sm sm:text-base font-semibold">Adinda Avu P</h3>
                    <p class="text-xs sm:text-sm text-gray-500">UX Writer</p>
                </div>

                <!-- Card 4 -->
                <div class="bg-white rounded-xl shadow p-3 sm:p-4 transition hover:-translate-y-2 hover:shadow-lg duration-300"
                    data-aos="fade-up" data-aos-delay="300">
                    <img src="/images/Deden.jpg" alt="Dhenok"
                        class="w-full aspect-[3/4] object-cover rounded-lg mb-2 transition duration-300 hover:scale-105">
                    <h3 class="text-sm sm:text-base font-semibold">Dhenok Sagita N</h3>
                    <p class="text-xs sm:text-sm text-gray-500">Product Growth Lead</p>
                </div>

                <!-- Card 5 -->
                <div class="bg-white rounded-xl shadow p-3 sm:p-4 transition hover:-translate-y-2 hover:shadow-lg duration-300"
                    data-aos="fade-up" data-aos-delay="400">
                    <img src="/images/Vadia.jpg" alt="Vadia"
                        class="w-full aspect-[3/4] object-cover rounded-lg mb-2 transition duration-300 hover:scale-105">
                    <h3 class="text-sm sm:text-base font-semibold">Vadia Armadani</h3>
                    <p class="text-xs sm:text-sm text-gray-500">Data Scientist</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Testimoni -->
    <x-testimonials />

    <x-cta />


    @include('components.footer')

    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        AOS.init({
            duration: 600,
            once: true,
        });
    </script>
</body>

</html>
