<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Koneksi Kita - Kolaborasi Sponsorship & Mahasiswa</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet" />
    <link rel="icon" href="/images/LogoFix.png" type="image/png">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap"
        as="style">
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
    <section class="bg-[#EEEDED] py-12 px-4">
        <div class="max-w-5xl mx-auto h-screen">
            <!-- Box Intro -->
            <div class="w-full rounded-lg bg-white p-4 shadow-md mb-6 text-[#0a3a1a]"
                style="box-shadow: 0 4px 6px rgb(0 0 0 / 0.1)">
                <h1 class="font-bold text-base md:text-xl mb-2">
                    Selamat datang di Event Board
                </h1>
                <p class="text-xs md:text-base leading-relaxed">
                    Dengan meluangkan beberapa menit untuk memposting acara atau acara Anda di Event Board, Anda membuka
                    saluran tambahan yang unik untuk terhubung dengan brand. Mengapa brand marketer menggunakan Event
                    Board? Mengapa acara dan properti menggunakan Event Board?
                </p>
            </div>

            <!-- Sub Info -->
            <p class="text-[#0a3a1a] text-center text-xs md:text-sm max-w-md mx-auto mb-6">
                Tambahkan informasi sesuai keperluan Anda dengan memilih<br />salah satu dari 2 opsi di bawah ini
            </p>

            <!-- Grid Cards -->
            <div class="grid grid-cols-2 gap-4">
                <!-- Card: Sponsor -->
                <div class="relative h-[280px] rounded-lg overflow-hidden group">
                    <img src="https://storage.googleapis.com/a1aa/image/af296739-04c4-4ece-9f1f-7b8c31da4bb8.jpg"
                        alt="Modern office building"
                        class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105" />
                    <div
                        class="absolute inset-0 bg-[#0a3a1a]/90 z-10 flex items-center justify-center transition-opacity duration-300 group-hover:opacity-0">
                        <h2 class="text-white font-extrabold text-lg md:text-2xl tracking-wide">SPONSOR</h2>
                    </div>
                    <a href="{{ route('katalog.sponsor') }}"
                        class="absolute inset-0 bg-[#FFB000]/95 z-20 opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex flex-col justify-center items-center text-center px-3">
                        <h2 class="text-[#0a3a1a] font-bold text-base md:text-xl mb-1">
                            Kenapa <span class="text-white">Sponsor</span><br />Menggunakan KoneksiKita?
                        </h2>
                        <p class="text-white text-[10px] md:text-sm leading-snug mb-2">
                            SponsorPitch membantu Sponsor menemukan peluang sponsorship yang paling relevan dan
                            menguntungkan.
                        </p>
                        <button
                            class="bg-white text-[#0a3a1a] text-xs font-semibold px-3 py-1 rounded-full shadow hover:bg-yellow-200 transition">
                            Klik untuk melanjutkan
                        </button>
                    </a>
                </div>

                <!-- Card: Event Organizer -->
                <div class="relative h-[280px] rounded-lg overflow-hidden group">
                    <img src="https://storage.googleapis.com/a1aa/image/21a857c1-8ac8-4615-92d6-c2815ec76429.jpg"
                        alt="Group of people gathered in a large indoor event space"
                        class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105" />
                    <div
                        class="absolute inset-0 bg-[#0a3a1a]/90 z-10 flex items-center justify-center transition-opacity duration-300 group-hover:opacity-0">
                        <h2 class="text-white font-extrabold text-lg md:text-2xl tracking-wide text-center">EVENT
                            ORGANIZER</h2>
                    </div>
                    <a href="{{ route('katalog.event') }}"
                        class="absolute inset-0 bg-[#FFB000]/95 z-20 opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex flex-col justify-center items-center text-center px-3">
                        <h2 class="text-[#0a3a1a] font-bold text-base md:text-xl mb-1 leading-snug">
                            Kenapa <span class="text-white">Event Organizer</span><br />Menggunakan KoneksiKita?
                        </h2>
                        <p class="text-[#0a3a1a] text-[10px] md:text-sm leading-snug mb-2">
                            Koneksikita membantu Event Organizer menemukan sponsor ideal dan memposting proposal dengan
                            mudah ke brand yang relevan.
                        </p>
                        <button
                            class="bg-white text-[#0a3a1a] text-xs font-semibold px-3 py-1 rounded-full shadow hover:bg-yellow-200 transition">
                            Klik untuk melanjutkan
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </section>


    @include('components.footer')
</body>

</html>
