@props(['title', 'desc', 'price', 'oldPrice', 'features', 'package'])

<div class="bg-[#EEEDED] rounded-2xl border border-green-300 p-8 shadow-md hover:shadow-lg transition flex flex-col">
    <h3 class="text-xl font-bold text-[#004225] mb-2">PAKET <span>{{ strtoupper($title) }}</span></h3>
    <p class="text-gray-600 mb-6 text-sm">{{ $desc }}</p>
    <hr class="border-green-300 mb-6">

    <div class="mb-6">
        <p class="text-red-500 line-through text-sm">Rp. {{ number_format($oldPrice, 0, ',', '.') }},-</p>
        <p class="text-2xl font-extrabold text-[#004225]">Rp. {{ number_format($price, 0, ',', '.') }},-</p>
    </div>

    <ul class="text-left text-sm space-y-3 mb-8 flex-1">
        @foreach ($features as $feature)
            <li class="flex items-center {{ $feature['included'] ? 'text-[#004225]' : 'text-red-500' }}">
                <span class="mr-2">{{ $feature['included'] ? '✔️' : '❌' }}</span>
                {{ $feature['text'] }}
            </li>
        @endforeach
    </ul>

    <button class="bg-[#85BB65] hover:bg-[#68a268] font-semibold py-3 rounded-xl w-full"
        onclick="openModal('{{ strtolower($title) }}', {{ $price }})">
        Beli Sekarang
    </button>



</div>
