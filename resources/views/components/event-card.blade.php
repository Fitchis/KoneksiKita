<div
    class="bg-white rounded-xl sm:rounded-2xl shadow-md p-3 sm:p-4 lg:p-6 flex flex-col hover:shadow-xl transition-shadow duration-300 ease-in-out relative overflow-hidden
    w-full sm:w-auto max-w-[95%] sm:max-w-[300px] mx-auto sm:mx-0">

    @if ($event->is_finished ?? false)
        <div
            class="absolute top-0 left-0 bg-black bg-opacity-60 w-full h-full z-10 flex items-start justify-center pt-4">
            <span class="text-white text-[10px] sm:text-xs font-semibold bg-green-700 px-2 sm:px-3 py-1 rounded-full">
                Event Finished
            </span>
        </div>
    @endif

    <img src="{{ $event->poster ? asset('posters/' . $event->poster) : 'https://via.placeholder.com/400x200' }}"
        alt="{{ $event->title }}" class="rounded-md mb-3 w-full h-24 sm:h-36 md:h-44 lg:h-52 object-contain z-0">

    <h2
        class="text-sm sm:text-base md:text-lg lg:text-xl font-semibold text-[#0a3a0d] mb-1 truncate hover:text-[#4B5335] z-0">
        {{ $event->title }}
    </h2>

    <p class="text-gray-500 text-[11px] sm:text-sm md:text-base mb-2 z-0">
        {{ \Carbon\Carbon::parse($event->date)->format('d M Y') }}
    </p>

    <p class="text-gray-700 text-[11px] sm:text-sm md:text-base mb-2 flex-1 z-0">
        {{ Str::limit($event->description, 35) }}
    </p>

    <div class="flex justify-between items-center text-[11px] sm:text-sm md:text-base text-gray-600 mt-2 mb-4 z-0">
        <p class="flex items-center space-x-1">
            <i class="fas fa-map-marker-alt p-1 text-[#4B5335]"></i>
            <span>{{ $event->location }}</span>
        </p>
        <p class="flex items-center space-x-1">
            <i class="fas fa-users p-1 text-[#4B5335]"></i>
            <span>{{ $event->participant_estimate }}+</span>
        </p>
    </div>

    <a href="{{ route('event.show', $event->id) }}"
        class="text-green-700 font-semibold mt-auto inline-block hover:text-green-500 transition-colors duration-200 z-0 text-[11px] sm:text-sm md:text-base">
        Lihat Detail &rarr;
    </a>
</div>
