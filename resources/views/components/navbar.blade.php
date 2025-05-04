<header class="bg-[#004225] sticky top-0 z-50 shadow-md">
    <nav class="max-w-7xl mx-auto flex items-center justify-between px-6 py-4 relative" aria-label="Primary Navigation">
        <!-- Logo -->
        <div class="flex items-center space-x-2">
            <img src="{{ asset('images/Logo.png') }}" alt="Logo" class="w-10 h-10 object-contain" />
            <div class="text-white text-xs font-semibold leading-tight">
                <div>Koneksikita</div>
                <div class="text-[8px] font-normal">Dari Ide ke Aksi</div>
            </div>
        </div>

        <!-- Menu Desktop -->
        <ul class="hidden md:flex space-x-4 font-semibold text-base">
            <li>
                <a href="{{ route('welcome') }}"
                    class="px-3 py-1 rounded
                   {{ request()->routeIs('welcome')
                       ? 'bg-white text-[#004225]'
                       : 'text-white hover:bg-white hover:text-[#004225] transition' }}">
                    Beranda
                </a>
            </li>
            <li>
                <a href="{{ route('cara-kerja') }}"
                    class="px-3 py-1 rounded
                   {{ request()->routeIs('cara-kerja')
                       ? 'bg-white text-[#004225]'
                       : 'text-white hover:bg-white hover:text-[#004225] transition' }}">
                    Tentang Kami
                </a>
            </li>
            <li>
                <a href="{{ route('papan-acara') }}"
                    class="px-3 py-1 rounded
                   {{ request()->routeIs('papan-acara')
                       ? 'bg-white text-[#004225]'
                       : 'text-white hover:bg-white hover:text-[#004225] transition' }}">
                    Papan Acara
                </a>
            </li>
        </ul>



        <!-- Hamburger Menu (Mobile) -->
        <button class="md:hidden text-white focus:outline-none" onclick="toggleMobileMenu()">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>

        <!-- Avatar + Dropdown -->
        <div class="relative hidden md:block">
            @auth
                @php $user = Auth::user(); @endphp
                @if ($user->profile_photo)
                    <button onclick="toggleDropdown()" aria-label="Toggle dropdown"
                        class="w-10 h-10 rounded-full overflow-hidden shadow-inner focus:ring-2 focus:ring-white">
                        <img src="{{ asset('profile_photos/' . $user->profile_photo) }}" alt="Avatar"
                            class="w-full h-full object-cover">
                    </button>
                @else
                    <button onclick="toggleDropdown()" aria-label="Toggle dropdown"
                        class="w-10 h-10 rounded-full bg-yellow-400 text-[#004225] font-bold flex items-center justify-center text-sm shadow-inner focus:ring-2 focus:ring-white">
                        {{ strtoupper($user->name[0]) }}
                    </button>
                @endif
            @else
                <button onclick="toggleDropdown()" aria-label="Toggle menu"
                    class="w-10 h-10 rounded-full bg-[#CCCCCC] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-400"></button>
            @endauth

            <!-- Dropdown Menu -->
            <div id="dropdown-menu"
                class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg py-2 text-sm z-50 transform scale-95 opacity-0 transition-all duration-200 pointer-events-none">
                @guest
                    <a href="{{ route('login') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Login</a>
                @else
                    @if ($user->role === 'superadmin')
                        <a href="{{ route('dashboard') }}"
                            class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Dashboard</a>
                    @endif
                    <a href="{{ route('akun') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Akun</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Setelan</a>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Keluar</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
                @endguest
            </div>
        </div>
    </nav>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="md:hidden px-6 pb-4 hidden">
        <ul class="space-y-3 text-white font-semibold text-base">
            <li>
                <a href="{{ route('welcome') }}"
                    class="px-3 py-1 rounded
                   {{ request()->routeIs('welcome')
                       ? 'bg-white text-[#004225]'
                       : 'text-white hover:bg-white hover:text-[#004225] transition' }}">
                    Beranda
                </a>
            </li>
            <li>
                <a href="{{ route('cara-kerja') }}"
                    class="px-3 py-1 rounded
                   {{ request()->routeIs('cara-kerja')
                       ? 'bg-white text-[#004225]'
                       : 'text-white hover:bg-white hover:text-[#004225] transition' }}">
                    Tentang Kami
                </a>
            </li>
            <li>
                <a href="{{ route('papan-acara') }}"
                    class="px-3 py-1 rounded
                   {{ request()->routeIs('papan-acara')
                       ? 'bg-white text-[#004225]'
                       : 'text-white hover:bg-white hover:text-[#004225] transition' }}">
                    Papan Acara
                </a>
            </li>
        </ul>
    </div>

    <!-- Mobile User Dropdown -->
    <div class="md:hidden px-6 mt-4 border-t border-white/20 pt-4">
        @auth
            @php
                $user = Auth::user();
            @endphp
            <div class="flex items-center justify-between">
                <div class="text-white font-semibold">
                    {{ $user->name }}
                </div>
                @if ($user->profile_photo)
                    <button onclick="toggleMobileDropdown()"
                        class="w-10 h-10 rounded-full overflow-hidden shadow-inner focus:ring-2 focus:ring-white">
                        <img src="{{ asset('profile_photos/' . $user->profile_photo) }}" alt="Avatar"
                            class="w-full h-full object-cover">
                    </button>
                @else
                    <button onclick="toggleMobileDropdown()"
                        class="w-10 h-10 bg-yellow-400 text-[#004225] font-bold flex items-center justify-center rounded-full shadow-inner focus:ring-2 focus:ring-white">
                        {{ strtoupper($user->name[0]) }}
                    </button>
                @endif
            </div>

            <div id="mobile-user-dropdown" class="mt-3 hidden">
                @if ($user->role === 'superadmin')
                    <a href="{{ route('dashboard') }}"
                        class="block px-4 py-2 text-sm text-white hover:bg-white/10 rounded">Dashboard</a>
                @endif
                <a href="{{ route('akun') }}" class="block px-4 py-2 text-sm text-white hover:bg-white/10 rounded">Akun</a>
                <a href="#" class="block px-4 py-2 text-sm text-white hover:bg-white/10 rounded">Setelan</a>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form-mobile').submit();"
                    class="block px-4 py-2 text-sm text-white hover:bg-white/10 rounded">
                    Keluar
                </a>
                <form id="logout-form-mobile" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
            </div>
        @else
            <a href="{{ route('login') }}" class="block px-4 py-2 mt-2 text-sm text-white hover:bg-white/10 rounded">
                Login
            </a>
        @endauth
    </div>

    <!-- Scripts -->
    <script>
        function toggleDropdown() {
            const dropdown = document.getElementById('dropdown-menu');
            dropdown.classList.toggle('opacity-0');
            dropdown.classList.toggle('scale-95');
            dropdown.classList.toggle('pointer-events-none');
        }

        function toggleMobileMenu() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        }

        function toggleMobileDropdown() {
            const dropdown = document.getElementById('mobile-user-dropdown');
            dropdown.classList.toggle('hidden');
        }


        window.addEventListener('click', function(event) {
            const dropdown = document.getElementById('dropdown-menu');
            const button = document.querySelector(
                'button[aria-label="Toggle dropdown"], button[aria-label="Toggle menu"]');
            if (!dropdown.contains(event.target) && !button.contains(event.target)) {
                dropdown.classList.add('opacity-0', 'scale-95', 'pointer-events-none');
            }
        });
    </script>
</header>
