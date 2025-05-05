<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ $event->title }} - Detail Event</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

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
            <a href="{{ route('katalog.event') }}" class="inline-flex items-center gap-1 hover:underline">
                Event
            </a>
            <span>›</span>
            <span class="font-bold">
                {{ $event->title }}
            </span>
        </nav>
    </div>

    <!-- Event Detail Section -->
    <section class="max-w-6xl mx-auto px-6 py-10 space-y-10">
        <!-- Bagian Atas: Gambar + Sidebar -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2">
                <h2 class="text-3xl font-bold text-[#4B5335] mb-4">{{ $event->title }}</h2>


                 <img src="{{ $event->poster ? asset('posters/' . $event->poster) : 'https://via.placeholder.com/800x400' }}"
                    alt="{{ $event->title }}" class="w-full h-auto max-h-[450px] object-contain rounded-lg mb-6">
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Share Event -->
                <div class="bg-white p-6 rounded-xl shadow-md">
                    <h3 class="text-lg font-semibold text-[#4B5335] mb-4">Bagikan Event</h3>
                    <div class="flex flex-col gap-3 text-sm">
                        <a href="#" class="flex items-center gap-2 hover:underline text-blue-700">
                            <i class="fab fa-linkedin"></i> Share on LinkedIn
                        </a>
                        <a href="#" class="flex items-center gap-2 hover:underline text-blue-600">
                            <i class="fab fa-facebook"></i> Share on Facebook
                        </a>
                        <button onclick="copyLink()" class="flex items-center gap-2 text-gray-600 hover:underline">
                            <i class="fas fa-link"></i> Copy Link
                        </button>
                    </div>
                </div>

                <!-- Kontak -->
                <div class="bg-white p-6 rounded-xl shadow-md text-center">
                    <div class="flex justify-center mb-4">
                        <div class="w-16 h-16 rounded-full bg-gray-200 flex items-center justify-center">
                            <i class="fas fa-user text-2xl text-gray-500"></i>
                        </div>
                    </div>
                    <h4 class="font-bold text-[#4B5335]">{{ $event->contact_name }}</h4>
                    <p class="text-sm text-gray-600">{{ $event->contact_position }}</p>
                    <a href="https://wa.me/{{ $event->contact_whatsapp }}"
                        class="block mt-4 bg-[#004225] text-white py-2 px-4 rounded-lg hover:bg-green-700">
                        Hubungi Panitia
                    </a>
                </div>
            </div>
        </div>

        <!-- Bagian Bawah: Info + Tentang -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Info Event -->
            <div class="bg-white p-6 rounded-xl shadow-md space-y-4">
                <h3 class="text-lg font-bold text-[#4B5335] mb-4">Info Event</h3>
                <div class="flex items-center gap-2 text-gray-700">
                    <i class="fas fa-star text-[#4B5335]"></i> {{ $event->type }}
                </div>
                <div class="flex items-center gap-2 text-gray-700">
                    <i class="fas fa-calendar-alt text-[#4B5335]"></i>
                    {{ \Carbon\Carbon::parse($event->date)->format('d M Y') }}
                </div>
                <div class="flex items-center gap-2 text-gray-700">
                    <i class="fas fa-users text-[#4B5335]"></i> {{ $event->participant_estimate }} Peserta
                </div>
                <div class="flex items-center gap-2 text-gray-700">
                    <i class="fas fa-map-marker-alt text-[#4B5335]"></i> {{ $event->location }}
                </div>
            </div>

            <!-- Tentang Event Ini -->
            <div class="bg-white p-6 rounded-xl shadow-md">
                <h3 class="text-lg font-bold text-[#4B5335] mb-4">Tentang Event Ini</h3>
                <p class="text-gray-700 leading-relaxed">
                    {!! nl2br(e($event->description)) !!}
                </p>
            </div>
        </div>
    </section>

    <!-- Section: Map Lokasi -->
    <section class="max-w-6xl mx-auto px-6 py-10 space-y-6">
        <div class="rounded-2xl overflow-hidden">
            <iframe src="https://maps.google.com/maps?q={{ urlencode($event->location) }}&output=embed"
                class="w-full h-64 rounded-2xl border-0" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>

        <div class="flex justify-center">
            @auth
                @if (Auth::id() === $event->user_id)
                    <div class="flex justify-center">
                        <div x-data="{ openEdit: false }">
                            <!-- Tombol untuk membuka modal -->
                            <button @click="openEdit = true"
                                class="inline-flex items-center gap-2 bg-white text-[#4B5335] font-semibold border border-[#4B5335] px-6 py-3 rounded-full shadow hover:bg-[#4B5335] hover:text-white transition">
                                <i class="fas fa-pen"></i> Edit Info Acara
                            </button>

                            <!-- Modal -->
                            <div x-show="openEdit"
                                class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50"
                                style="display: none;">
                                <div @click.away="openEdit = false"
                                    class="bg-white p-6 rounded-lg shadow-lg w-full max-w-xl">
                                    <h2 class="text-lg font-bold mb-4">Edit Lokasi Acara</h2>

                                    <form method="POST" action="{{ route('event.update', $event->id) }}">
                                        @csrf
                                        @method('PUT')

                                        <div class="mb-4">
                                            <label for="location"
                                                class="block text-sm font-medium text-gray-700">Lokasi</label>
                                            <input type="text" id="location" name="location"
                                                value="{{ $event->location }}"
                                                class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm p-2 focus:ring focus:ring-green-200 focus:outline-none"
                                                required>
                                        </div>

                                        <div class="flex justify-end gap-3">
                                            <button type="button" @click="openEdit = false"
                                                class="px-4 py-2 text-gray-600 hover:text-black">
                                                Batal
                                            </button>
                                            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-md">
                                                Simpan
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                    </div>
                @endif
            @endauth

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
                    desc="Cocok untuk Sponsor yang ingin membangun eksistensi di kalangan mahasiswa" :price="100000"
                    :oldPrice="200000" :package="'silver'" :features="[
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
    <!-- Modal -->
    <div id="modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
        <div class="bg-white rounded-xl p-6 w-full max-w-md text-center relative">
            <button class="absolute top-2 right-2 text-gray-600 text-xl" onclick="closeModal()">✖</button>

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

    <x-proposal-preview :proposal="$event->proposal" />

    @include('components.footer')

    <script>
        window.onload = function() {
            window.openModal = function(packageName, price) {
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
                } else {
                    console.warn('Elemen modal tidak ditemukan');
                }

                document.getElementById('modal').classList.remove('hidden');
            }

            window.closeModal = function() {
                document.getElementById('modal').classList.add('hidden');
            }

            function capitalize(str) {
                return str.charAt(0).toUpperCase() + str.slice(1);
            }
        };
    </script>
    <script>
        function copyLink() {
            navigator.clipboard.writeText(window.location.href)
                .then(() => alert('Link berhasil disalin!'))
                .catch(err => console.error('Gagal menyalin link', err));
        }
    </script>
</body>

</html>
