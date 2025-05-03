<footer class="bg-[#004225] text-white relative overflow-hidden">
    <!-- Lengkungan Kuning -->
    <div class="absolute bottom-0 right-0 w-40 h-40 bg-yellow-400 rounded-tl-full z-0"></div>

    <!-- Konten Utama -->
    <div class="relative z-10 max-w-6xl mx-auto px-6 py-10 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 text-sm">
        <!-- Logo dan Slogan -->
        <div class="flex flex-col items-start space-y-2">
            <img src="{{ asset('images/Logo.png') }}" alt="KoneksiKita Logo" class="w-28" />
            <p class="font-medium">Dari Ide ke Aksi</p>
        </div>

        <!-- Navigasi -->
        <div>
            <h4 class="font-semibold mb-2">Navigasi</h4>
            <ul class="space-y-1">
                <li><a href="{{ route('welcome') }}" class="hover:underline">Beranda</a></li>
                <li><a href="{{ route('papan-acara') }}" class="hover:underline">Papan Acara</a></li>
            </ul>
        </div>

        <!-- Sosial & Info -->
        <div class="flex flex-col space-y-3">
            <h4 class="font-semibold">Ikuti Kami</h4>
            <div class="flex space-x-4">
                <a href="#" class="hover:text-yellow-300"><i class="fab fa-whatsapp"></i></a>
            </div>
            <p class="text-xs mt-2 leading-relaxed">
                Jl. Ketintang No.156, Ketintang, Kec. Gayungan, Surabaya, Jawa Timur 60231<br>
                0811-3278-005<br>
                https://surabaya.telkomuniversity.ac.id/
            </p>
        </div>
    </div>

    <!-- Copyright -->
    <div class="bg-[#012E1A] text-center text-xs py-3">
        &copy; 2023 KoneksiKita. All Rights Reserved.
    </div>
</footer>
