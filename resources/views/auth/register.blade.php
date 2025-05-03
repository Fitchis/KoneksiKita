<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Registrasi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: "Inter", sans-serif;
        }
    </style>
</head>

<body class="min-h-screen bg-[#f7fff4] flex">
    <div class="w-1/2 bg-white flex flex-col justify-center px-10 sm:px-6 md:px-12 lg:px-16 xl:px-20">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <h2 class="text-[#00391a] font-extrabold text-xl mb-6">REGISTRASI</h2>
        <form method="POST" action="{{ route('register') }}" class="w-full max-w-md">
            @csrf

            <!-- Name -->
            <label class="block text-xs text-[#00391a] mb-1" for="name">Username</label>
            <input name="name" id="name" type="text" required
                class="w-full mb-4 py-2 px-4 rounded-full bg-[#cbd5ce] text-[#00391a] focus:outline-none focus:ring-2 focus:ring-[#7bb35a]" />

            <!-- Email -->
            <label class="block text-xs text-[#00391a] mb-1" for="email">Email</label>
            <input name="email" id="email" type="email" required
                class="w-full mb-4 py-2 px-4 rounded-full bg-[#cbd5ce] text-[#00391a] focus:outline-none focus:ring-2 focus:ring-[#7bb35a]" />

            <!-- Password -->
            <label class="block text-xs text-[#00391a] mb-1" for="password">Password</label>
            <input name="password" id="password" type="password" required
                class="w-full mb-4 py-2 px-4 rounded-full bg-[#cbd5ce] text-[#00391a] focus:outline-none focus:ring-2 focus:ring-[#7bb35a]" />
            <!-- Confirm Password -->
            <label class="block text-xs text-[#00391a] mb-1" for="password_confirmation">Konfirmasi Password</label>
            <input name="password_confirmation" id="password_confirmation" type="password" required
                class="w-full mb-4 py-2 px-4 rounded-full bg-[#cbd5ce] text-[#00391a] focus:outline-none focus:ring-2 focus:ring-[#7bb35a]" />

            <!-- Role -->
            <label for="role" class="block text-xs text-[#00391a] mb-1">Role</label>
            <select name="role" id="role" required
                class="w-full mb-4 py-2 px-4 rounded-full bg-[#cbd5ce] text-[#00391a] focus:outline-none focus:ring-2 focus:ring-[#7bb35a]">
                <option value="" disabled selected>Pilih Role</option>
                <option value="mahasiswa">Mahasiswa</option>
                <option value="perusahaan">Perusahaan</option>
            </select>


            <!-- Submit Button -->
            <button type="submit"
                class="w-full bg-[#7bb35a] text-white font-semibold rounded-full py-2 mb-6 hover:bg-[#6aa04a] transition-colors">
                Sign Up
            </button>
        </form>


        <div class="text-xs text-[#00391a] mb-6 text-center">
            Sudah memiliki akun?
            <a href="{{ route('login') }}" class="font-semibold text-[#00391a]">Login</a>
        </div>

        <div class="flex items-center justify-center mb-4 gap-4">
            <div class="border-t border-[#00391a] w-1/3"></div>
            <div class="text-xs text-[#00391a]">atau</div>
            <div class="border-t border-[#00391a] w-1/3"></div>
        </div>

        <div class="text-xs text-[#00391a] mb-4 text-center">
            Sign Up menggunakan akun lain
        </div>

        <button
            class="w-full flex items-center justify-center gap-2 bg-[#d9f7c4] text-[#00391a] font-semibold rounded-full py-2 mb-3 hover:bg-[#c0e9a0] transition-colors"
            type="button">
            <img alt="Google" class="w-5 h-5"
                src="https://storage.googleapis.com/a1aa/image/42bbd510-4ec5-4a61-06c5-8b3d5cd5fcf4.jpg" />
            Continue with Google
        </button>

        <button
            class="w-full flex items-center justify-center gap-2 bg-[#d9f7c4] text-[#00391a] font-semibold rounded-full py-2 hover:bg-[#c0e9a0] transition-colors"
            type="button">
            <img alt="Facebook" class="w-5 h-5"
                src="https://storage.googleapis.com/a1aa/image/a984c006-06a5-4e86-3fc5-899092a93dd2.jpg" />
            Continue with Facebook
        </button>
    </div>

    <div class="w-1/2 relative flex justify-center items-center">
        <img src="{{ asset('images/loginimg.png') }}" class="object-contain max-h-screen" />
        <a href="{{ url('/') }}"
            class="absolute top-6 right-6 text-[#00391a] text-3xl font-extrabold leading-none">×</a>
    </div>
</body>

</html>
