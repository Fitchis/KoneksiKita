<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Koneksi Kita - Kolaborasi Sponsorship & Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet" />
    <link rel="icon" href="/images/Logo.png" type="image/png">

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
    {{-- Section: Event Board Intro --}}
    <section class="bg-[#EEEDED] py-16 px-6">
        <div class="max-w-5xl mx-auto">
            <!-- Box Intro -->
            <div class="w-full rounded-lg bg-white p-6 shadow-md mb-8" style="box-shadow: 0 4px 6px rgb(0 0 0 / 0.1)">
                <h1 class="text-[#0a3a1a] font-bold text-lg md:text-xl mb-2">
                    Selamat datang di Event Board
                </h1>
                <p class="text-[#0a3a1a] text-sm md:text-base leading-relaxed">
                    Dengan meluangkan beberapa menit untuk memposting acara atau acara Anda di Event Board, Anda membuka
                    saluran tambahan yang unik untuk terhubung dengan brand. Mengapa brand marketer menggunakan Event
                    Board?
                    Mengapa acara dan properti menggunakan Event Board?
                </p>
            </div>

            <!-- Sub Info -->
            <p class="text-[#0a3a1a] text-center text-xs md:text-sm max-w-md mx-auto mb-8">
                Tambahkan informasi sesuai keperluan Anda dengan memilih
                <br />
                salah satu dari 2 opsi di bawah ini
            </p>

            <!-- Pilihan Cards -->
            <div class="flex flex-col sm:flex-row gap-6">
                <!-- Card: Sponsor -->
                <a href="{{ route('katalog.sponsor') }}"
                    class="relative flex-1 rounded-lg overflow-hidden cursor-pointer group block">
                    <img src="https://storage.googleapis.com/a1aa/image/af296739-04c4-4ece-9f1f-7b8c31da4bb8.jpg"
                        alt="Modern office building exterior with glass windows and trees around"
                        class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105"
                        width="600" height="350" />
                    <div class="absolute inset-0 bg-[#0a3a1a]/90 flex items-center justify-center">
                        <h2 class="text-white font-extrabold text-2xl md:text-3xl tracking-wide">SPONSOR</h2>
                    </div>
                </a>

                <!-- Card: Event Organizer -->
                <a href="{{ route('katalog.event') }}"
                    class="relative flex-1 rounded-lg overflow-hidden cursor-pointer group block">
                    <img src="https://storage.googleapis.com/a1aa/image/21a857c1-8ac8-4615-92d6-c2815ec76429.jpg"
                        alt="Group of people gathered in a large indoor event space with arched ceiling"
                        class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105"
                        width="600" height="350" />
                    <div class="absolute inset-0 bg-[#0a3a1a]/90 flex items-center justify-center">
                        <h2 class="text-white font-extrabold text-2xl md:text-3xl tracking-wide">EVENT ORGANIZER</h2>
                    </div>
                </a>
            </div>
        </div>
    </section>
    @include('components.footer')
</body>

</html>
