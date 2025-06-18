<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="/images/Logo.png" type="image/png">

    <title>Koneksi Kita - Kolaborasi Sponsorship & Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <style>
        body {
            font-family: "Poppins", sans-serif;
        }

        html {
            scroll-behavior: smooth;
        }

        .input-style {
            @apply w-full rounded-md border border-[#0a2a0d] bg-[#f1f8e9] text-sm text-[#0a2a0d] px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#0a2a0d];
        }

        label {
            font-size: 0.875rem;
        }
    </style>
</head>

<body>
    @include('components.navbar')
    <!-- Header Gambar -->
    <section class="bg-[#f1f8e9]">
        <div class="relative w-full h-[200px] overflow-hidden rounded-b-[100%_50%]">
            <!-- Gambar Latar -->
            <img src="https://storage.googleapis.com/a1aa/image/8759154a-3d85-431b-a57f-a16b30863284.jpg"
                alt="Dark green tinted image of a person holding a microphone in a dimly lit event"
                class="absolute inset-0 w-full h-full object-cover object-center z-0" />

            <!-- Overlay Gelap -->
            <div class="absolute inset-0 bg-[#0a2a0dcc] pointer-events-none z-0"></div>

            <!-- Breadcrumb -->
            <div class="absolute top-0 left-0 w-full px-6 py-4 text-white z-20 pointer-events-auto">
                <nav class="flex items-center gap-1 text-xs sm:text-sm font-semibold">
                    <a href="{{ route('welcome') }}" class="inline-flex items-center gap-1 hover:underline">
                        <i class="fas fa-home text-[10px]"></i>
                        Beranda
                    </a>
                    <span>›</span>
                    <a href="{{ route('papan-acara') }}" class="inline-flex items-center gap-1 hover:underline">
                        Event Board
                    </a>
                    <span>›</span>
                    <a href="{{ route('katalog.event') }}" class="inline-flex items-center gap-1 hover:underline">
                        Event
                    </a>
                    <span>›</span>
                    <span class="font-bold">
                        {{ $pageTitle ?? 'Tambah Sponsor' }}
                    </span>
                </nav>
            </div>

            <!-- Judul -->
            <div class="relative z-10 flex flex-col items-center justify-center h-full text-center px-4">
                <h1 class="text-white font-extrabold text-lg uppercase tracking-wider">
                    POSTING INFORMASI SPONSOR
                </h1>
                <p class="text-white text-sm mt-1">
                    Silahkan isi form berikut untuk memposting Sponsor
                </p>
            </div>
        </div>
    </section>



    <!-- Form -->
    <section class="bg-[#f1f8e9] py-10">
        <div class="max-w-5xl mx-auto px-6">
            <form action="{{ route('sponsor.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Grid form bagian atas -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label for="nama-perusahaan" class="block text-[#0a2a0d] mb-1">Nama Perusahaan</label>
                        <input id="nama-perusahaan" type="text" name="name" class="input-style" />
                    </div>
                    <div>
                        <label for="jenis-perusahaan" class="block text-[#0a2a0d] mb-1">Pilih Jenis Perusahaan</label>
                        <select id="jenis-perusahaan" name="company_type" class="input-style">
                            <option></option>
                            <option value="Option 1">Produk </option>
                            <option value="Option 2">cash</option>
                        </select>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="lokasi" class="block text-[#0a2a0d] mb-1">Lokasi</label>
                        <input id="lokasi" type="text" name="location" class="input-style" />
                    </div>
                </div>

                <div class="my-8 h-2 bg-[#0a2a0d] rounded-full"></div>

                <!-- Grid form bagian bawah -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="sm:col-span-2">
                        <label for="no-perusahaan" class="block text-[#0a2a0d] mb-1">No. yang Bisa Dihubungi</label>
                        <input id="no-perusahaan" type="text" name="phone" class="input-style" />
                    </div>
                    <div>
                        <label for="email-perusahaan" class="block text-[#0a2a0d] mb-1">Email Perusahaan</label>
                        <input id="email-perusahaan" type="email" name="email" class="input-style" />
                    </div>
                    <div class="sm:col-span-2">
                        <label for="deskripsi-perusahaan" class="block text-[#0a2a0d] mb-1">Deskripsi Perusahaan</label>
                        <textarea id="deskripsi-event" name="description" rows="5"
                            class="p-2 block w-full rounded-md border border-[#0a2a0d]  text-sm text-[#0a2a0d] focus:outline-none focus:ring-2 focus:ring-[#0a2a0d]"
                            placeholder="Tuliskan deskripsi dengan jelas dan detail. "></textarea>
                    </div>
                    <div class="max-w-xl mx-auto mb-8">
                        <div class="bg-white rounded-xl shadow-md p-6">
                            <h3 class="text-lg font-bold text-[#004225] mb-2">Contoh Pengisian Deskripsi Perusahaan</h3>
                            <div class="mb-2">
                                <span class="font-semibold">Tentang Perusahaan</span>
                                <p class="text-gray-700 text-sm">
                                    Dapatkan kenyamanan terbaik untuk daily outfit setiap hari di Kustomproject. Mulai
                                    dari berbagai model pakaian, ukuran, dan material premium serta bebas ongkir siap
                                    menjadi partner fashionmu!
                                </p>
                            </div>
                            <div class="mb-2">
                                <span class="font-semibold">Timbal-balik Kerja Sama</span>
                                <ul class="list-disc pl-5 text-gray-700 text-sm">
                                    <li>
                                        <span class="font-semibold">Dukungan Dana:</span> Sponsor memberikan bantuan
                                        finansial yang akan digunakan untuk mendukung kelancaran acara, operasional, dan
                                        produksi materi promosi.
                                    </li>
                                    <li>
                                        <span class="font-semibold">Produk atau Merchandise:</span> Sponsor dapat
                                        memberikan produk mereka untuk digunakan sebagai hadiah, doorprize, atau bagian
                                        dari experience dalam acara.
                                    </li>
                                    <li>
                                        <span class="font-semibold">Media Promosi / Materi Branding:</span> Seperti
                                        spanduk, banner, atau media digital yang akan ditampilkan selama acara.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Upload Logo Brand -->
                <div class="mt-6">
                    <label class="block text-[#0a2a0d] mb-2 font-semibold">Upload Logo Sponsor</label>

                    <label for="logo-upload"
                        class="cursor-pointer flex items-center justify-center w-48 h-32 border-2 border-gray-300 border-dashed rounded-2xl bg-white hover:bg-gray-50 transition duration-200">
                        <!-- Icon Upload -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-[#0a2a0d]" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2m-4-4l-4-4m0 0l-4 4m4-4v12" />
                        </svg>
                    </label>

                    <!-- Hidden Input -->
                    <input id="logo-upload" type="file" name="logo" class="hidden" />
                </div>


                <!-- Tombol Submit -->
                <div class="mt-10 flex justify-center">
                    <button type="submit"
                        class="w-[250px] h-[40px] bg-[#8cbf6e] rounded-md text-white text-sm font-semibold">
                        Posting Informasi Event
                    </button>
                </div>
            </form>
        </div>
    </section>
</body>

</html>
