<footer class="bg-[#004225] text-white relative overflow-hidden">
    <!-- Konten Utama -->
    <div class="relative z-10 max-w-6xl mx-auto px-6 py-10 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 text-sm">
        <!-- Logo dan Slogan -->
        <div class="flex flex-col items-start space-y-2">
            <img src="{{ asset('images/LogoFooter.png') }}" alt="KoneksiKita Logo" class="w-58" />
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
                <a href="https://wa.me/628113278005" target="_blank" class="hover:text-yellow-300">
                    <i class="fab fa-whatsapp"></i>
                </a>
            </div>
            <p class="text-xs mt-2 leading-relaxed">
                <a href="https://maps.google.com/?q=Jl. Ketintang No.156, Ketintang, Kec. Gayungan, Surabaya"
                    target="_blank" class="hover:underline">
                    Jl. Ketintang No.156, Ketintang, Kec. Gayungan, Surabaya, Jawa Timur 60231
                </a><br>
                <a href="tel:08113278005" class="hover:underline">0811-3278-005</a><br>
                <a href="https://surabaya.telkomuniversity.ac.id/" target="_blank" class="hover:underline">
                    https://surabaya.telkomuniversity.ac.id/
                </a>
            </p>
        </div>

    </div>

    <!-- Copyright -->
    <div class="bg-[#012E1A] text-center text-xs py-3">
        &copy; 2024 KoneksiKita. All Rights Reserved.
    </div>
</footer>
