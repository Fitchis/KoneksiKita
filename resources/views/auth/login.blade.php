<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login User</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="min-h-screen bg-[#f7fff4] flex">
    <!-- Form Login -->
    <div class="w-full md:w-1/2 flex flex-col justify-center px-10 sm:px-16 md:px-20">
        <h2 class="text-[#00391a] font-extrabold text-xl mb-6">LOGIN USER</h2>

        @if (session('status'))
            <div class="mb-4 text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="w-full max-w-md">
            @csrf

            <label class="block text-sm text-[#00391a] mb-1" for="email">Email</label>
            <input id="email" name="email" type="email" :value="old('email')" required autofocus
                class="w-full mb-4 py-2 px-4 rounded-full bg-[#cbd5ce] text-[#00391a] focus:outline-none focus:ring-2 focus:ring-[#7bb35a]">

            @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror

            <label class="block text-sm text-[#00391a] mb-1" for="password">Password</label>
            <input id="password" name="password" type="password" required
                class="w-full mb-1 py-2 px-4 rounded-full bg-[#cbd5ce] text-[#00391a] focus:outline-none focus:ring-2 focus:ring-[#7bb35a]">

            @error('password')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror

            <div class="text-right text-xs text-[#00391a] mb-6">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="hover:underline">Lupa Sandi ?</a>
                @endif
            </div>

            <button type="submit"
                class="w-full bg-[#7bb35a] text-white font-semibold rounded-full py-2 mb-6 hover:bg-[#6aa04a] transition-colors">
                Login Now
            </button>
        </form>

        <div class="text-sm text-[#00391a] mb-6 text-center">
            Belum memiliki akun ?
            <a href="{{ route('register') }}" class="font-semibold text-[#3a8c2f] cursor-pointer">
                Sign Up
            </a>
        </div>


        <div class="flex items-center justify-center mb-4 gap-4">
            <div class="border-t border-[#00391a] w-1/3"></div>
            <div class="text-sm text-[#00391a]">atau</div>
            <div class="border-t border-[#00391a] w-1/3"></div>
        </div>

        <div class="text-sm text-[#00391a] mb-4 text-center">Login menggunakan akun lain</div>

        <button type="button"
            class="w-full flex items-center justify-center gap-3 bg-[#d9f7c4] text-[#00391a] font-semibold rounded-full py-2 mb-3 hover:bg-[#c0e9a0] transition-colors">
            <img src="https://img.icons8.com/color/48/000000/google-logo.png" alt="Google logo" class="w-5 h-5" />
            Continue with Google
        </button>

        <button type="button"
            class="w-full flex items-center justify-center gap-3 bg-[#d9f7c4] text-[#00391a] font-semibold rounded-full py-2 hover:bg-[#c0e9a0] transition-colors">
            <img src="https://img.icons8.com/color/48/000000/facebook-new.png" alt="Facebook logo" class="w-5 h-5" />
            Continue with Facebook
        </button>
    </div>

    <!-- Gambar Ilustrasi -->
    <div class="hidden md:flex w-1/2 relative items-center justify-center">
        <img src="{{ asset('images/loginimg.png') }}" alt="Ilustrasi login" class="object-contain max-h-screen" />
        <a href="{{ url('/') }}"
            class="absolute top-6 right-6 text-[#00391a] text-3xl font-extrabold leading-none focus:outline-none hover:text-[#256d1b] transition-colors">
            ×
        </a>


    </div>
</body>

</html>
