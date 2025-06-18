<div
    class="bg-white rounded-3xl shadow-lg p-4 sm:p-6 flex flex-col hover:shadow-xl transition-shadow duration-300 ease-in-out w-full max-w-xs mx-auto sm:mx-0">
    <img src="{{ $sponsor->logo ? (Str::startsWith($sponsor->logo, 'http') ? $sponsor->logo : asset('sponsor_logos/' . $sponsor->logo)) : 'https://via.placeholder.com/400x200?text=Brand' }}"
        alt="{{ $sponsor->name }}" class="rounded-t-lg w-full h-48 object-contain bg-gray-100" />
    <h2 class="text-xl font-semibold text-[#0a3a0d] mb-2 truncate hover:text-[#4B5335]">
        {{ $sponsor->name }}
    </h2>
    <p class="text-gray-700 text-sm mb-2 flex-1">
        {{ Str::limit($sponsor->description, 30) }}
    </p>
    <!-- Jenis perusahaan -->
    <div class="flex items-center text-sm text-gray-600 mt-2 mb-2">
        <p class="flex items-center space-x-2">
            <i class="fas fa-briefcase text-[#4B5335]"></i>
            <span>{{ $sponsor->company_type ?? 'Tidak diketahui' }}</span>
        </p>
    </div>

    <!-- Lokasi -->
    <div class="flex items-center text-sm text-gray-600 mb-4">
        <p class="flex items-center space-x-2">
            <i class="fas fa-map-marker-alt text-[#4B5335]"></i>
            <span>{{ Str::limit($sponsor->location, 30) ?? '–' }}</span>
        </p>
    </div>

    <a href="{{ route('sponsor.show', $sponsor->id) }}"
        class="text-green-700 font-semibold mt-auto inline-block hover:text-green-500 transition-colors duration-200">
        Lihat Detail &rarr;
    </a>
</div>
