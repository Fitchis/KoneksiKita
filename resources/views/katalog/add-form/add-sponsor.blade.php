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
                        <textarea id="deskripsi-event" name="description" rows="5" class="input-style resize-none"></textarea>

                    </div>
                </div>

                <!-- Upload Poster & Proposal -->
                <div class="mt-6 flex flex-col gap-4 sm:flex-row sm:gap-6">
                    <div>
                        <label class="block text-[#0a2a0d] mb-1">Upload Logo Sponsor</label>
                        <input type="file" name="logo" class="input-style" />
                    </div>

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
