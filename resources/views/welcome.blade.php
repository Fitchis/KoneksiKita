<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="google-site-verification" content="PdsQ3yEEn9fti7reaimPrl449ardKh3Le3SsTfFsdeE" />
    <link rel="icon" href="{{ url('favicon.ico') }}?v=2" type="image/x-icon">


    <title>Koneksi Kita - Kolaborasi Sponsorship & Mahasiswa</title>
    <meta name="description"
        content="KoneksiKita mempertemukan mahasiswa dan perusahaan dalam satu platform kolaboratif.">
    <meta name="keywords" content="KoneksiKita, kolaborasi, mahasiswa, perusahaan, kerja sama, platform">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="Koneksi Kita - Kolaborasi Sponsorship & Mahasiswa">
    <meta property="og:description"
        content="KoneksiKita mempertemukan mahasiswa dan perusahaan dalam satu platform kolaboratif.">
    <meta property="og:image" content="https://koneksikita.site/images/LogoFix.png">
    <meta property="og:url" content="https://koneksikita.site">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:image" content="https://koneksikita.site/images/LogoFix.png">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet" />
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap"
        as="style">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />

    <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "url": "https://koneksikita.site",
  "logo": "https://koneksikita.site/favicon.ico"
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

<body>
    @include('components.navbar')

    <main class="relative">

        <!-- Section: Hero -->
        <section class="hero-section relative bg-cover bg-center"
            style="background-image: url('{{ asset('images/Welcomebg.png') }}')"
            alt="Gambar hero tentang kolaborasi mahasiswa dan industri">
            <div class="absolute inset-0 bg-[#004225]/70 z-0"></div>

            <div
                class="relative z-10 max-w-7xl mx-auto px-6 pt-20 pb-28 flex flex-col md:flex-row items-center md:items-start gap-10 md:gap-20">
                <!-- Kiri: Teks -->
                <div class="max-w-xl text-white">
                    <h1 class="font-extrabold text-4xl md:text-5xl leading-tight mb-6" style="line-height: 1.2">
                        Dukung Generasi Muda untuk<br />
                        Masa Depan yang Lebih Cerah
                    </h1>
                    <p class="font-normal text-lg leading-relaxed text-white/90">
                        Dukungan anda menjadi bagian penting dalam menciptakan pengalaman belajar, inspirasi, inovasi,
                        dan membentuk pemimpin masa depan di dunia bisnis digital.
                    </p>
                </div>

                <!-- Kanan: Gambar Hero + Badge -->
                <div class="relative flex-shrink-0 w-64 h-64 md:w-[320px] md:h-[320px] md:ml-auto">
                    <img src="{{ asset('images/Hero.png') }}" alt="Hero Image"
                        class="w-full h-full object-cover rounded-[80px]" />
                </div>

            </div>
        </section>

        <!-- Section: Unlock Sponsorship Revenue -->
        <section
            class="sponsorship-section relative max-w-7xl mx-auto px-6 py-20 flex flex-col md:flex-row items-center gap-12 md:gap-20">
            <!-- Kiri: Gambar -->
            <div class="relative w-full md:w-1/2">
                <div class="bg-[#004225] rounded-[30px] w-[90%] h-[90%] absolute bottom-0 left-0 z-0"></div>
                <img src="{{ asset('images/hero2.png') }}" alt="Classroom"
                    class="relative z-10 rounded-[30px] shadow-lg w-full object-cover" />
            </div>

            <!-- Kanan: Text -->
            <div class="md:w-1/2">
                <h2 class="text-3xl md:text-4xl font-extrabold text-[#004225] mb-4">
                    Temukan Peluang <span class="text-[#8BC34A]">Kerjasama</span>
                </h2>
                <p class="text-base md:text-lg text-gray-700 mb-8 leading-relaxed">
                    Kami adalah platform yang menghubungkan mahasiswa Bisnis Digital dengan industri, menyediakan
                    informasi dan
                    peluang kolaborasi untuk pengalaman belajar praktis. Melalui acara dan lokakarya, mahasiswa dapat
                    berinteraksi
                    langsung dengan profesional dan mengembangkan keterampilan di era digital.
                </p>
            </div>
        </section>

        {{-- <!-- Section: Partner/Logo Slider -->
        <section class="logo-slider-partnership pt-4 bg-white">
            <div class="max-w-7xl mx-auto px-6">
                <h2 class="text-2xl md:text-3xl font-extrabold text-center text-[#004225] mb-4 ">Mitra Kami</h2>
                <div class="swiper logoSwiper h-16">
                    <div class="swiper-wrapper flex items-center h-full">
                        <div class="swiper-slide flex justify-center items-center h-full">
                            <img src="{{ asset('images/traveloka.png') }}" class="max-h-10 object-cover"
                                alt="traveloka" />
                        </div>
                        <div class="swiper-slide flex justify-center items-center h-full">
                            <img src="{{ asset('images/blibli.png') }}" class="max-h-10 object-cover" alt="blibli" />
                        </div>
                        <div class="swiper-slide flex justify-center items-center h-full">
                            <img src="{{ asset('images/adidas.png') }}" class="max-h-10 object-cover" alt="adidas" />
                        </div>
                        <div class="swiper-slide flex justify-center items-center h-full">
                            <img src="{{ asset('images/shopee.png') }}" class="max-h-10 object-cover" alt="shopee" />
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}

        <!-- Section: partner dan event ideal -->
        <section class="bg-[#EEEDED] py-14">
            <div class="max-w-7xl mx-auto px-6 text-center">
                <!-- Title -->
                <h2 class="text-2xl md:text-3xl font-extrabold text-[#000] mb-12">
                    Partner Ideal untuk <span class="text-[#85BB65]">Event</span> atau <span
                        class="text-[#85BB65]">Sponsorship</span> Anda
                </h2>

                <!-- Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Card 1 -->
                    <div class="bg-white rounded-2xl p-8 shadow-md hover:shadow-lg transition">
                        <img src="{{ asset('images/Picon.png') }}" alt="Posting Event"
                            class="mx-auto mb-6 w-40 h-40 object-contain">
                        <h3 class="text-xl font-bold mb-2">POSTING EVENT</h3>
                        <p class="text-gray-600 text-sm">Postong Event & Dapatkan Sponsor</p>
                    </div>

                    <!-- Card 2 -->
                    <div class="bg-white rounded-2xl p-8 shadow-md hover:shadow-lg transition">
                        <img src="{{ asset('images/Picon2.png') }}" alt="Sponsor"
                            class="mx-auto mb-6 w-40 h-40 object-contain">
                        <h3 class="text-xl font-bold mb-2">SPONSOR</h3>
                        <p class="text-gray-600 text-sm">Temukan Audiens yang Sesuai</p>
                    </div>

                    <!-- Card 3 -->
                    <div class="bg-white rounded-2xl p-8 shadow-md hover:shadow-lg transition">
                        <img src="{{ asset('images/Picon3.png') }}" alt="Connect"
                            class="mx-auto mb-6 w-40 h-40 object-contain">
                        <h3 class="text-xl font-bold mb-2">CONNECT</h3>
                        <p class="text-gray-600 text-sm">Akses Kontak Strategis</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Tabswitch Section -->
        <section class="bg-[#EEEDED] py-10" x-data="{ activeTab: 'mahasiswa' }">
            <h2 class="mx-auto px-6 text-center py-10 font-semibold text-2xl text-green-900">
                Alur Penggunaan Platform
            </h2>
            <div class="max-w-7xl mx-auto px-6 text-center">
                <!-- Tab Switcher -->
                <div class="flex justify-center mb-12">
                    <div class="bg-gray-200 rounded-xl p-1 flex shadow-inner">
                        <button @click="activeTab = 'mahasiswa'"
                            :class="activeTab === 'mahasiswa' ? 'bg-green-800 text-white' : 'text-gray-400'"
                            class="px-8 py-2 font-semibold rounded-xl transition-all duration-300">Mahasiswa</button>
                        <button @click="activeTab = 'sponsor'"
                            :class="activeTab === 'sponsor' ? 'bg-green-800 text-white' : 'text-gray-400'"
                            class="px-8 py-2 font-semibold rounded-xl transition-all duration-300">Sponsor</button>
                    </div>
                </div>

                <!-- Steps Container -->
                <div class="bg-white border-2 border-green-500 rounded-2xl p-10 max-w-5xl mx-auto shadow-md">
                    <template x-if="activeTab === 'mahasiswa'">
                        <div class="flex flex-col md:flex-row justify-between items-center gap-8" x-transition>
                            <template
                                x-for="(step, index) in [
                        { icon: 'user-plus', title: 'Registrasi / Login', desc: 'Daftar atau masuk ke akun Anda' },
                        { icon: 'document-plus', title: 'Post Informasi Event', desc: 'Tambahkan detail event Anda' },
                        { icon: 'check-badge', title: 'Selesai', desc: 'Event Anda siap menerima sponsor' }
                    ]"
                                :key="index">
                                <div
                                    class="flex flex-col items-center text-center relative w-full max-w-[220px] border border-green-400 rounded-lg p-6 bg-white">
                                    <!-- Icon -->
                                    <div class="bg-green-300 rounded-full p-3">
                                        <template x-if="step.icon === 'user-plus'">
                                            <svg class="w-8 h-8 text-green-900" fill="none" stroke="currentColor"
                                                stroke-width="1.5" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M18 9v3m1.5-1.5h-3M15 7a4 4 0 11-8 0 4 4 0 018 0zM3 21v-1a4 4 0 014-4h4" />
                                            </svg>
                                        </template>
                                        <template x-if="step.icon === 'document-plus'">
                                            <svg class="w-8 h-8 text-green-900" fill="none" stroke="currentColor"
                                                stroke-width="1.5" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 10v6m3-3H9m3-10H6a2 2 0 00-2 2v14a2 2 0 002 2h12a2 2 0 002-2V10l-6-6z" />
                                            </svg>
                                        </template>
                                        <template x-if="step.icon === 'check-badge'">
                                            <!-- Ganti dengan icon check-circle -->
                                            <svg class="w-8 h-8 text-green-900" fill="none" stroke="currentColor"
                                                stroke-width="1.5" viewBox="0 0 24 24">
                                                <circle cx="12" cy="12" r="10" stroke="currentColor"
                                                    stroke-width="1.5" fill="none" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="1.5" d="M9 12l2 2 4-4" />
                                            </svg>
                                        </template>
                                    </div>

                                    <!-- Step Number -->
                                    <div
                                        class="mt-4 flex items-center justify-center w-10 h-10 bg-green-800 text-white rounded-full">
                                        <span x-text="index + 1"></span>
                                    </div>

                                    <!-- Step Text -->
                                    <h3 class="font-bold mt-4 text-lg" x-text="step.title"></h3>
                                    <p class="text-sm text-gray-600 mt-1" x-text="step.desc"></p>

                                    <!-- Arrow Right -->
                                    <div x-show="index < 2"
                                        class="absolute right-[-30px] top-1/2 transform -translate-y-1/2 hidden md:block">
                                        <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor"
                                            stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </template>
                    <template x-if="activeTab === 'sponsor'">
                        <div class="flex flex-col md:flex-row justify-between items-center gap-8" x-transition>
                            <template
                                x-for="(step, index) in [
            { icon: 'user-plus', title: 'Registrasi / Login', desc: 'Sponsor mendaftar dan login' },
            { icon: 'magnifying-glass', title: 'Cari Event', desc: 'Temukan event yang relevan' },
            { icon: 'handshake', title: 'Beri Sponsor', desc: 'Dukung event pilihan Anda' }
        ]"
                                :key="index">
                                <div
                                    class="flex flex-col items-center text-center relative w-full max-w-[220px] border border-green-400 rounded-lg p-6 bg-white">
                                    <!-- Icon -->
                                    <div class="bg-green-300 rounded-full p-3">
                                        <template x-if="step.icon === 'user-plus'">
                                            <svg class="w-8 h-8 text-green-900" fill="none" stroke="currentColor"
                                                stroke-width="1.5" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M18 9v3m1.5-1.5h-3M15 7a4 4 0 11-8 0 4 4 0 018 0zM3 21v-1a4 4 0 014-4h4" />
                                            </svg>
                                        </template>
                                        <template x-if="step.icon === 'magnifying-glass'">
                                            <svg class="w-8 h-8 text-green-900" fill="none" stroke="currentColor"
                                                stroke-width="1.5" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z" />
                                            </svg>
                                        </template>
                                        <template x-if="step.icon === 'handshake'">
                                            <!-- Ganti dengan icon Handshake (dua tangan salaman) style outline -->
                                            <svg class="w-8 h-8 text-green-900" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"
                                                class="lucide lucide-handshake-icon lucide-handshake">
                                                <path d="m11 17 2 2a1 1 0 1 0 3-3" />
                                                <path
                                                    d="m14 14 2.5 2.5a1 1 0 1 0 3-3l-3.88-3.88a3 3 0 0 0-4.24 0l-.88.88a1 1 0 1 1-3-3l2.81-2.81a5.79 5.79 0 0 1 7.06-.87l.47.28a2 2 0 0 0 1.42.25L21 4" />
                                                <path d="m21 3 1 11h-2" />
                                                <path d="M3 3 2 14l6.5 6.5a1 1 0 1 0 3-3" />
                                                <path d="M3 4h8" />
                                            </svg>
                                        </template>
                                    </div>

                                    <!-- Step Number -->
                                    <div
                                        class="mt-4 flex items-center justify-center w-10 h-10 bg-green-800 text-white rounded-full">
                                        <span x-text="index + 1"></span>
                                    </div>

                                    <!-- Step Text -->
                                    <h3 class="font-bold mt-4 text-lg" x-text="step.title"></h3>
                                    <p class="text-sm text-gray-600 mt-1" x-text="step.desc"></p>

                                    <!-- Arrow Right -->
                                    <div x-show="index < 2"
                                        class="absolute right-[-30px] top-1/2 transform -translate-y-1/2 hidden md:block">
                                        <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor"
                                            stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </template>
                </div>
            </div>
        </section>

        <!-- Section: package -->
        <section class="bg-[#ffffff] py-16">
            <div class="max-w-7xl mx-auto px-6 text-center">
                <h2 class="text-2xl md:text-3xl font-extrabold text-[#004225] mb-4">Paket Sponsorship</h2>
                <p class="text-gray-700 max-w-2xl mx-auto mb-12">Tentukan paket dukungan sponsorship sesuai keinginanmu
                </p>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <x-sponsorship-card title="Silver"
                        desc="Cocok untuk Sponsor yang ingin membangun eksistensi di kalangan mahasiswa"
                        :price="100000" :oldPrice="200000" :package="'silver'" :features="[
                            ['text' => 'Logo Perusahaan ditampilkan', 'included' => true],
                            ['text' => 'Dedicated Video/Post', 'included' => true],
                            ['text' => 'Sertifikat Apresiasi', 'included' => true],
                            ['text' => 'Produk digunakan oleh Panitia/peserta', 'included' => false],
                            ['text' => 'Exclusive Thank You Post', 'included' => false],
                            ['text' => 'Mention/Tag di media sosial', 'included' => false],
                            ['text' => 'Penyebutan nama brand dalam publikasi acara', 'included' => false],
                            ['text' => 'Penyebutan Brand oleh MC saat acara berlangsung', 'included' => false],
                        ]" />

                    <x-sponsorship-card title="Gold"
                        desc="Dirancang untuk sponsor yang sedang berkembang dan ingin meningkatkan brand awarenessnya"
                        :price="150000" :oldPrice="300000" :package="'gold'" :features="[
                            ['text' => 'Logo Perusahaan ditampilkan', 'included' => true],
                            ['text' => 'Dedicated Video/Post', 'included' => true],
                            ['text' => 'Sertifikat Apresiasi', 'included' => true],
                            ['text' => 'Penyebutan nama brand dalam publikasi acara', 'included' => true],
                            ['text' => 'Mention/Tag di media sosial', 'included' => true],
                            ['text' => 'Exclusive Thank You Post', 'included' => false],
                            ['text' => 'Produk digunakan oleh Panitia/peserta', 'included' => false],
                            ['text' => 'Penyebutan Brand oleh MC saat acara berlangsung', 'included' => false],
                        ]" />

                    <x-sponsorship-card title="Platinum"
                        desc="Solusi optimal bagi sponsor yang ingin tampil menonjol dan memperkuat citra di kalangan mahasiswa"
                        :price="300000" :oldPrice="600000" :package="'platinum'" :features="[
                            ['text' => 'Logo Perusahaan ditampilkan', 'included' => true],
                            ['text' => 'Dedicated Video/Post', 'included' => true],
                            ['text' => 'Sertifikat Apresiasi', 'included' => true],
                            ['text' => 'Penyebutan nama brand dalam publikasi acara', 'included' => true],
                            ['text' => 'Mention/Tag di media sosial', 'included' => true],
                            ['text' => 'Exclusive Thank You Post', 'included' => true],
                            ['text' => 'Produk digunakan oleh Panitia/peserta', 'included' => true],
                            ['text' => 'Penyebutan Brand oleh MC saat acara berlangsung', 'included' => true],
                        ]" />
                </div>
            </div>
        </section>
        <!-- Modal package-->
        <div id="packageModal"
            class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
            <div class="bg-white rounded-xl p-6 w-full max-w-md text-center relative">
                <button class="absolute top-2 right-2 text-gray-600 text-xl" onclick="closePackageModal()">✖</button>

                <h3 id="modal-title" class="text-xl font-bold text-[#004225] mb-2"></h3>
                <p id="modal-description" class="text-sm mb-4"></p>

                <div class="bg-gray-100 p-2 rounded font-semibold text-[#004225] mb-4">
                    1234 5678 90 a.n Event Bisnis Digital
                </div>

                <p class="text-sm mb-4">Setelah melakukan transfer, silakan kirim bukti transfer untuk konfirmasi ke
                    admin.</p>

                <a href="https://wa.me/6281234567890" target="_blank"
                    class="bg-[#85BB65] hover:bg-[#68a268] text-white font-bold py-2 px-4 rounded-xl">
                    Chat Admin
                </a>
            </div>
        </div>

        <!-- Section: Sponsorship Contact -->
        <section class="bg-white py-6 px-4 ">
            <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div>
                    <h3 class="text-2xl font-bold text-[#004225] mb-4">Kontak <span
                            class="text-[#8BC34A]">Sponsorship</span> yang <span class="text-[#8BC34A]">jelas</span>
                    </h3>
                    <p class="text-gray-700 text-base leading-relaxed">
                        Dapatkan lebih banyak kemitraan dengan menghubungi kontak yang relevan. Sampaikan proposal
                        menarik dan bangun hubungan yang saling menguntungkan.
                    </p>
                </div>
                <div class="relative">
                    <img src="{{ asset('images/OurValue.png') }}" alt="Contact Illustration"
                        class="w-full max-w-sm mx-auto">
                </div>
            </div>
        </section>

        <!-- Section: Event Board Information -->
        <section class="bg-[#EEEDED] py-6 px-4">
            <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div>
                    <h3 class="text-2xl font-bold text-[#FFB000] mb-4">Daftar Informasi <span
                            class="text-gray-700">Acara</span></h3>
                    <p class="text-gray-700 text-base leading-relaxed">
                        <strong>Pemilik Sponsor:</strong> ringkaskan proses pengelolaan permintaan sponsorship dan
                        temukan
                        peluang.<br>
                        <strong>Event Organizer:</strong> temukan cara baru untuk meningkatkan kerjasama dengan Sponsor.
                    </p>
                </div>
                <div class="relative">
                    <img src="images/OurValue1.png" alt="Event Board UI" class="w-full max-w-sm mx-auto">
                </div>
            </div>
        </section>

        <!-- Section: FAQ Item -->
        <section class="py-12 bg-[#f9f9f4]">
            <div class="max-w-4xl mx-auto px-4">
                <h2 class="text-4xl font-bold text-center text-green-900 mb-10">FAQ</h2>

                <div class="space-y-4">
                    <!--  Item -->
                    <div x-data="{ open: false }" class="bg-white rounded-lg shadow-md overflow-hidden">
                        <button @click="open = !open" class="flex justify-between items-center w-full p-6 text-left">
                            <span class="font-bold text-green-900">Apa itu koneksiKita dan bagaimana cara
                                kerjanya?</span>
                            <svg :class="{ 'transform rotate-180': open }"
                                class="w-5 h-5 text-green-500 transition-transform duration-300" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="open" x-transition class="px-6 pb-6 text-green-700">
                            KoneksiKita membantu Anda menemukan sponsor untuk event Anda dengan mudah melalui platform
                            online.
                        </div>
                    </div>

                    <!--  Item -->
                    <div x-data="{ open: false }" class="bg-white rounded-lg shadow-md overflow-hidden">
                        <button @click="open = !open" class="flex justify-between items-center w-full p-6 text-left">
                            <span class="font-bold text-green-900">Apa keuntungan menggunakan KoneksiKita dibandingkan
                                mencari sponsor secara tradisional?</span>
                            <svg :class="{ 'transform rotate-180': open }"
                                class="w-5 h-5 text-green-500 transition-transform duration-300" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="open" x-transition class="px-6 pb-6 text-green-700">
                            Anda dapat menghemat waktu, menjangkau sponsor lebih luas, dan memproses semuanya secara
                            digital.
                        </div>
                    </div>
                    <!--  Item -->
                    <div x-data="{ open: false }" class="bg-white rounded-lg shadow-md overflow-hidden">
                        <button @click="open = !open" class="flex justify-between items-center w-full p-6 text-left">
                            <span class="font-bold text-green-900">Apakah penggunaan KoneksiKita berbayar?</span>
                            <svg :class="{ 'transform rotate-180': open }"
                                class="w-5 h-5 text-green-500 transition-transform duration-300" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="open" x-transition class="px-6 pb-6 text-green-700">
                            Tidak Perlu.
                        </div>
                    </div>
                    <!--  Item -->
                    <div x-data="{ open: false }" class="bg-white rounded-lg shadow-md overflow-hidden">
                        <button @click="open = !open" class="flex justify-between items-center w-full p-6 text-left">
                            <span class="font-bold text-green-900">Bagaimana koneksiKita memastikan keamanan
                                transaksi?</span>
                            <svg :class="{ 'transform rotate-180': open }"
                                class="w-5 h-5 text-green-500 transition-transform duration-300" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="open" x-transition class="px-6 pb-6 text-green-700">
                            Keamanan adalah prioritas utama kami. Sistem transaksi kami menggunakan one gateway yang
                            mana semua transaksi akan dilewatkan pada satu akun utama yang akan diteruskan ke pihak
                            penyelenggara sesuai dengan keterangan yang diberikan oleh sponsor untuk salah satu kegiatan
                            yang diajukan.
                        </div>
                    </div>
                    <!--  Item  -->
                    <div x-data="{ open: false }" class="bg-white rounded-lg shadow-md overflow-hidden">
                        <button @click="open = !open" class="flex justify-between items-center w-full p-6 text-left">
                            <span class="font-bold text-green-900">Berapa lama proses mendapatkan sponsor melalui
                                KoneksiKita?</span>
                            <svg :class="{ 'transform rotate-180': open }"
                                class="w-5 h-5 text-green-500 transition-transform duration-300" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="open" x-transition class="px-6 pb-6 text-green-700">
                            Waktu untuk mendapatkan sponsor melalui KoneksiKita bervariasi tergantung pada beberapa
                            faktor, termasuk jenis event, anggaran yang dibutuhkan, dan daya tarik proposal. Secara
                            umum, event dengan proposal yang lengkap dan menarik dapat mulai menerima minat dari sponsor
                            dalam waktu 1-2 minggu. Proses negosiasi dan finalisasi biasanya membutuhkan 2-4 minggu
                            tambahan. Kami menyarankan penyelenggara acara untuk mendaftarkan event mereka minimal 3
                            bulan sebelum tanggal pelaksanaan untuk hasil optimal.
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section: Template -->
        <section class="bg-[#EEEDED] py-16 text-center">
            <div class="container mx-auto px-4">
                <h2 class="text-4xl font-bold text-green-900 mb-6">Butuh Template Proposal Sponsorship</h2>
                <p class="text-lg text-green-900 mb-8">
                    Dapatkan template proposal sponsorship yang profesional dan siap pakai untuk memudahkan Anda
                    mendapatkan sponsor untuk event Anda.
                </p>
                <button onclick="openTemplateModal()"
                    class="bg-[#85BB65] text-white text-xl font-bold px-10 py-4 rounded-2xl hover:bg-[#71a056] transition">
                    Download Template
                </button>
                <p class="mt-6 text-green-900 text-lg">Gratis untuk semua pengguna Koneksi Kita</p>
            </div>
        </section>
        <!-- Template Modal -->
        <div id="templateModal"
            class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
            <div class="bg-[#f7f7db] p-8 rounded-2xl w-full max-w-md relative">
                <p class="text-green-900 text-lg mb-6">
                    Silakan isi data berikut untuk mendapatkan template proposal sponsorship. Download akan
                    Segera dilakukan.
                </p>
                <div id="successMessage"
                    class="hidden text-green-800 bg-green-100 border border-green-400 rounded-md px-4 py-3 mb-4 text-sm">
                    Data berhasil dikirim! Unduhan akan dimulai otomatis.
                </div>
                <form id="requestForm" class="space-y-4">
                    @csrf
                    <div>
                        <input type="text" name="nama_event" placeholder="Nama Event"
                            class="w-full rounded-md border border-[#c8e6c9] bg-white text-sm text-[#0a2a0d] px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#7cb342]"
                            required />
                    </div>
                    <div>
                        <input type="email" name="email" placeholder="E-Mail"
                            class="w-full rounded-md border border-[#c8e6c9] bg-white text-sm text-[#0a2a0d] px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#7cb342]"
                            required />
                    </div>
                    <div>
                        <input type="text" name="no_telp" placeholder="No. Telp"
                            class="w-full rounded-md border border-[#c8e6c9] bg-white text-sm text-[#0a2a0d] px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#7cb342]"
                            required />
                    </div>
                    <div>
                        <input type="text" name="jenis_acara" placeholder="Jenis Acara"
                            class="w-full rounded-md border border-[#c8e6c9] bg-white text-sm text-[#0a2a0d] px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#7cb342]"
                            required />
                    </div>
                    <div>
                        <input type="text" name="lokasi" placeholder="Lokasi Pemohon"
                            class="w-full rounded-md border border-[#c8e6c9] bg-white text-sm text-[#0a2a0d] px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#7cb342]"
                            required />
                    </div>

                    <div class="pt-4 flex justify-end space-x-4">
                        <button type="button" onclick="closeTemplateModal()"
                            class="bg-gray-300 text-black font-semibold text-sm rounded-md px-6 py-3 transition hover:bg-gray-400">
                            Batal
                        </button>
                        <button type="submit" id="submitBtn"
                            class="flex items-center justify-center bg-[#85BB65] hover:bg-[#2e7d32] text-white font-semibold text-sm rounded-md px-6 py-3 transition relative">
                            <span id="btnText">Dapatkan Template</span>
                            <svg id="loadingSpinner" class="w-5 h-5 ml-2 hidden animate-spin" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10"
                                    stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z">
                                </path>
                            </svg>
                        </button>
                    </div>
                </form>

            </div>
        </div>

        <x-testimonials />
        <x-cta />

    </main>
    @include('components.footer')
    <!--  AlpineJS -->
    <script src="//unpkg.com/alpinejs" defer></script>
    <!-- Alpine.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>


    <script>
        // === MODAL PAKET SPONSORSHIP ===
        function openPackageModal(packageName, price) {
            const formattedPrice = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            }).format(price);

            const titleEl = document.getElementById('modal-title');
            const descEl = document.getElementById('modal-description');

            if (titleEl && descEl) {
                titleEl.innerText = `Paket ${capitalize(packageName)} – ${formattedPrice}`;
                descEl.innerText =
                    `Silakan kirim biaya sebesar ${formattedPrice} untuk Paket ${capitalize(packageName)} ke rekening berikut ini.`;
            }

            document.getElementById('packageModal').classList.remove('hidden');
        }

        function closePackageModal() {
            document.getElementById('packageModal').classList.add('hidden');
        }

        function capitalize(str) {
            return str.charAt(0).toUpperCase() + str.slice(1);
        }
    </script>
    {{-- Tabswitch --}}
    <script>
        function tabSwitcher() {
            return {
                activeTab: 'mahasiswa',
                tabs: [{
                        id: 'mahasiswa',
                        label: 'Mahasiswa',
                        steps: [{
                                icon: 'user-plus',
                                title: 'Registrasi / Login',
                                desc: 'Daftar atau masuk ke akun Anda'
                            },
                            {
                                icon: 'plus-circle',
                                title: 'Post Informasi Event',
                                desc: 'Tambahkan detail event Anda'
                            },
                            {
                                icon: 'check-circle',
                                title: 'Selesai',
                                desc: 'Event Anda siap menerima sponsor'
                            }
                        ]
                    },
                    {
                        id: 'sponsor',
                        label: 'Sponsor',
                        steps: [{
                                icon: 'user-plus',
                                title: 'Registrasi / Login',
                                desc: 'Buat akun sponsor atau masuk'
                            },
                            {
                                icon: 'magnifying-glass',
                                title: 'Jelajahi Event',
                                desc: 'Temukan event yang sesuai dengan misi Anda'
                            },
                            {
                                icon: 'handshake',
                                title: 'Beri Dukungan',
                                desc: 'Pilih dan sponsori event pilihan Anda'
                            }
                        ]
                    }
                ],
                switchTab(tabId) {
                    this.activeTab = tabId;
                },
                init() {}
            }
        }
    </script>

    <script>
        function openTemplateModal() {
            document.getElementById('templateModal').classList.remove('hidden');
        }

        function closeTemplateModal() {
            document.getElementById('templateModal').classList.add('hidden');
        }

        document.getElementById('requestForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const form = e.target;
            const formData = new FormData(form);
            const submitBtn = document.getElementById('submitBtn');
            const btnText = document.getElementById('btnText');
            const spinner = document.getElementById('loadingSpinner');

            btnText.textContent = 'Mengunduh...';
            spinner.classList.remove('hidden');
            submitBtn.disabled = true;

            fetch("{{ route('request-template') }}", {
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: formData
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success && data.download_url) {
                        // Tampilkan pesan sukses
                        document.getElementById('successMessage').classList.remove('hidden');

                        // Trigger download
                        window.open(data.download_url, '_blank');

                        // Reset form dan UI
                        btnText.textContent = 'Dapatkan Template';
                        spinner.classList.add('hidden');
                        submitBtn.disabled = false;
                        form.reset();

                        // Tutup modal setelah 3 detik
                        setTimeout(() => {
                            closeTemplateModal();
                            document.getElementById('successMessage').classList.add('hidden');
                        }, 3000);
                    }

                })
                .catch(err => {
                    console.error(err);
                    alert('Gagal mengirim data. Silakan coba lagi.');
                    btnText.textContent = 'Dapatkan Template';
                    spinner.classList.add('hidden');
                    submitBtn.disabled = false;
                });
        });
    </script>

</body>

</html>
