<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Koneksi Kita - Kolaborasi Sponsorship & Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet" />
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" as="style">
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
        <!-- Overlay semi-transparan -->
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
            <a href="{{ route('register') }}"
                class="inline-block px-8 py-3 bg-[#004225] text-white rounded-full hover:bg-[#004225c9] transition">
                Daftar Sekarang!
            </a>
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
        <div class="max-w-6xl mx-auto text-center">
            <h2 class="text-2xl md:text-3xl font-bold text-[#004225] mb-4">Komitmen Kami</h2>
            <p class="text-gray-700 mb-12">
                Prinsip yang memandu kami dalam membangun SponsorConnect.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Card 1 -->
                <div class="bg-white rounded-xl shadow-md p-8 flex flex-col items-center text-center" data-aos="fade-up"
                    data-aos-duration="800">
                    <div class="w-12 h-12 mb-4 text-[#7FB77E]">
                        <!-- Kolaborasi Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zm-16 0a2 2 0 114 0 2 2 0 01-4 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-[#004225] mb-2">Kolaborasi</h3>
                    <p class="text-gray-700 text-sm">
                        Kami percaya bahwa kerjasama yang baik akan menghasilkan manfaat bagi semua pihak.
                    </p>
                </div>

                <!-- Card 2 -->
                <div class="bg-white rounded-xl shadow-md p-8 flex flex-col items-center text-center" data-aos="fade-up"
                    data-aos-delay="200" data-aos-duration="800">
                    <div class="w-12 h-12 mb-4 text-[#7FB77E]">
                        <!-- Integritas Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13.828 10.172a4 4 0 00-5.656 0l-3.535 3.536a4 4 0 105.657 5.656l1.415-1.414M10.172 13.828a4 4 0 015.656 0l3.536 3.535a4 4 0 11-5.657 5.657l-1.414-1.415" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-[#004225] mb-2">Integritas</h3>
                    <p class="text-gray-700 text-sm">
                        Kami menjunjung tinggi kejujuran dan transparansi dalam setiap aspek bisnis kami.
                    </p>
                </div>

                <!-- Card 3 -->
                <div class="bg-white rounded-xl shadow-md p-8 flex flex-col items-center text-center" data-aos="fade-up"
                    data-aos-delay="400" data-aos-duration="800">
                    <div class="w-12 h-12 mb-4 text-[#7FB77E]">
                        <!-- Inovasi Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 3a7 7 0 00-7 7c0 2.667 1.333 4 2 5l1 1v2a1 1 0 001 1h2a1 1 0 001-1v-2l1-1c.667-1 2-2.333 2-5a7 7 0 00-7-7z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 21h6" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-[#004225] mb-2">Inovasi</h3>
                    <p class="text-gray-700 text-sm">
                        Kami terus berinovasi untuk memberikan solusi terbaik bagi pengguna kami.
                    </p>
                </div>

                <!-- Card 4 -->
                <div class="bg-white rounded-xl shadow-md p-8 flex flex-col items-center text-center"
                    data-aos="fade-up" data-aos-delay="600" data-aos-duration="800">
                    <div class="w-12 h-12 mb-4 text-[#7FB77E]">
                        <!-- Aksesibilitas Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4a2 2 0 110 4 2 2 0 010-4zm0 4v12m-4 0h8m-8-8h8" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-[#004225] mb-2">Aksesibilitas</h3>
                    <p class="text-gray-700 text-sm">
                        Kami berkomitmen untuk membuat sponsorship dapat diakses oleh semua kalangan.
                    </p>
                </div>

            </div>
        </div>
    </section>

    <!-- Section: Testimoni -->
    <section class="bg-white py-12">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-[#004225] mb-12">Kata Mereka</h2>

            <!-- Swiper Container -->
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">

                    <!-- Slide 1 -->
                    <div class="swiper-slide flex justify-center">
                        <img src="{{ asset('images/Timg1.png') }}" alt="Testimoni 1"
                            class="rounded-2xl object-cover
                        w-full max-w-xs 
                        sm:max-w-sm        
                        md:max-w-md        
                        lg:max-w-lg       
                        shadow-lg" />
                    </div>

                    <!-- Slide 2 -->
                    <div class="swiper-slide flex justify-center">
                        <img src="{{ asset('images/Timg2.png') }}" alt="Testimoni 2"
                            class="rounded-2xl object-cover
                        w-full max-w-xs sm:max-w-sm md:max-w-md lg:max-w-lg
                        shadow-lg" />
                    </div>

                    <!-- Slide 3 -->
                    <div class="swiper-slide flex justify-center">
                        <img src="{{ asset('images/Timg3.png') }}" alt="Testimoni 3"
                            class="rounded-2xl object-cover
                        w-full max-w-xs sm:max-w-sm md:max-w-md lg:max-w-lg
                        shadow-lg" />
                    </div>

                </div>

                <!-- Pagination -->
                <div class="swiper-pagination !mt-6 !relative !bottom-0 text-center"></div>
            </div>
        </div>
    </section>

    <x-cta />


    @include('components.footer')

    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        // Slider testimonial
        const testimonialSwiper = new Swiper('.mySwiper', {
            slidesPerView: 1,
            spaceBetween: 12,
            breakpoints: {
                640: {
                    slidesPerView: 2
                },
                1024: {
                    slidesPerView: 1
                },
            },
            autoHeight: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true
            },
            autoplay: {
                delay: 3000,
                disableOnInteraction: false
            },
        });
    </script>
    <script>
        AOS.init({
            duration: 600,
            once: true,
        });
    </script>
</body>

</html>
