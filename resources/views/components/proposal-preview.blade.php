<section class="max-w-6xl mx-auto px-6 py-16 space-y-8">

    <!-- Judul -->
    <h2 class="text-2xl font-bold text-[#4B5335] mb-6 text-center">Preview Proposal Event</h2>

    <!-- Preview Frame -->
    <div class="rounded-2xl overflow-hidden shadow bg-gray-100 h-[500px] flex items-center justify-center">
        @if ($proposal)
            <iframe src="{{ asset('storage/' . $proposal) }}" class="w-full h-full" frameborder="0"></iframe>
        @else
            <span class="text-gray-500">Proposal belum tersedia.</span>
        @endif
    </div>

    <!-- Download Button -->
    <div class="flex justify-center mt-6">
        @if ($proposal)
            <a href="{{ asset('storage/' . $proposal) }}" download
                class="inline-flex items-center gap-2 bg-yellow-400 hover:bg-yellow-500 text-[#4B5335] font-bold py-3 px-8 rounded-full transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M3 3a1 1 0 011-1h12a1 1 0 011 1v12a1 1 0 01-1 1H8l-5 5v-5H4a1 1 0 01-1-1V3zm9 6a1 1 0 00-1-1H8V6a1 1 0 00-2 0v2H4a1 1 0 000 2h2v2a1 1 0 002 0V9h2a1 1 0 001-1z"
                        clip-rule="evenodd" />
                </svg>
                Download PDF
            </a>
        @endif
    </div>

</section>
