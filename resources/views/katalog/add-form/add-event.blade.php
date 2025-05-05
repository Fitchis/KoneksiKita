<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Koneksi Kita - Kolaborasi Sponsorship & Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="/images/Logo.png" type="image/png">

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
            <img src="https://storage.googleapis.com/a1aa/image/8759154a-3d85-431b-a57f-a16b30863284.jpg"
                alt="Dark green tinted image of a person holding a microphone in a dimly lit event"
                class="absolute inset-0 w-full h-full object-cover object-center z-0" />
            <div class="absolute inset-0 bg-[#0a2a0dcc] pointer-events-none z-0"></div>

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
                        {{ $pageTitle ?? 'Tambah Event' }}
                    </span>
                </nav>
            </div>

            <div class="relative z-10 flex flex-col items-center justify-center h-full text-center px-4">
                <h1 class="text-white font-extrabold text-lg uppercase tracking-wider">
                    POSTING INFORMASI EVENT
                </h1>
                <p class="text-white text-sm mt-1">
                    Silahkan isi form berikut untuk memposting acaramu
                </p>
            </div>
        </div>
    </section>

    <!-- Form -->
    <section class="bg-[#f1f8e9] py-10">
        <div class="max-w-5xl mx-auto px-6">
            <!-- ... Bagian atas tetap sama ... -->
            <form action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Grid form bagian atas -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label for="title">Nama Event</label>
                        <input id="title" name="title" type="text" class="input-style" required />
                    </div>
                    <div>
                        <label for="type">Jenis Event</label>
                        <select id="type" name="type" class="input-style" required>
                            <option value=""></option>
                            <option value="Webinar">Webinar</option>
                            <option value="Lomba">Lomba</option>
                            <option value="Workshop">Workshop</option>
                        </select>
                    </div>
                    <div>
                        <label for="date">Tanggal Acara</label>
                        <input id="date" name="date" type="date" class="input-style" required />
                    </div>
                    <div>
                        <label for="participant_estimate">Estimasi Jumlah Peserta</label>
                        <input id="participant_estimate" name="participant_estimate" type="number" class="input-style"
                            required />
                    </div>
                    <div class="sm:col-span-2">
                        <label for="location">Lokasi</label>
                        <input id="location" name="location" type="text" class="input-style" required />
                    </div>
                </div>

                <div class="my-8 h-2 bg-[#0a2a0d] rounded-full"></div>

                <!-- Grid form bagian bawah -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label for="contact_name">Nama CP</label>
                        <input id="contact_name" name="contact_name" type="text" class="input-style" required />
                    </div>
                    <div>
                        <label for="contact_position">Posisi di Event</label>
                        <input id="contact_position" name="contact_position" type="text" class="input-style"
                            required />
                    </div>
                    <div class="sm:col-span-2">
                        <label for="contact_whatsapp">No. Whatsapp CP</label>
                        <input id="contact_whatsapp" name="contact_whatsapp" type="text" class="input-style"
                            required />
                    </div>
                    <div class="sm:col-span-2">
                        <label for="description">Deskripsi Event</label>
                        <textarea id="description" name="description" rows="5" class="input-style resize-none" required></textarea>
                    </div>
                </div>

                <div class="mt-6 flex flex-col gap-4 sm:flex-row sm:gap-6">
                    <div>
                        <label for="image">Upload Poster Event</label>
                        <input id="image" name="image" type="file" class="input-style" />
                    </div>
                    <div>
                        <label for="proposal">Upload Proposal Event</label>
                        <input id="proposal" name="proposal" type="file" class="input-style" />
                    </div>
                </div>

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
