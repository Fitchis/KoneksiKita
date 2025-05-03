<section
    {{ $attributes->merge(['class' => 'relative w-full h-[500px] flex items-center justify-center text-white text-center']) }}>
    {{-- Background Image --}}
    <img src="{{ asset($background ?? 'images/CTABG.png') }}" alt="CTA Background"
        class="absolute inset-0 w-full h-full object-cover z-0" />

    {{-- Gradient Overlay --}}
    <div class="absolute inset-0 bg-gradient-to-t from-[#004225]/80 to-[#004225]/30 z-10"></div>

    {{-- Content --}}
    <div class="relative z-20 max-w-2xl px-4">
        <h2 class="text-3xl md:text-4xl font-bold leading-tight mb-4">
            {{ $title ?? 'Temukan Partner yang Tepat untuk Anda' }}</h2>
        <p class="text-white/90 mb-6">
            {{ $description ?? 'Manfaatkan kekuatan kemitraan dengan platform penjualan sponsorship dan partnership terdepan.' }}
        </p>
        <a href="{{ $buttonUrl ?? '/register' }}"
            class="inline-block bg-white text-[#004225] font-semibold px-6 py-3 rounded-lg hover:bg-gray-100 transition duration-300">
            {{ $buttonText ?? 'Daftar Acara atau Brandmu Sekarang' }}
        </a>
    </div>
</section>
