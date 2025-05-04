<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Akun Saya</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#f5f6e5] font-sans">
    @include('components.navbar')

    <div
        class="max-w-5xl mx-auto m-2 bg-white p-10 rounded-3xl shadow-md flex flex-col lg:flex-row justify-between items-start">

        <!-- Form Update Akun -->
        <form method="POST" action="{{ route('akun.update') }}" class="w-full lg:w-1/2 mb-8 lg:mb-0">
            @csrf
            <h1 class="text-xl font-bold text-[#00391a] mb-6">Akun Saya</h1>

            <!-- Flash Message -->
            @if (session('status'))
                <div class="mb-4 bg-green-100 text-green-800 font-semibold px-4 py-2 rounded">
                    {{ session('status') }}
                </div>
            @endif

            <!-- Error Validation -->
            @if ($errors->any())
                <div class="mb-4 bg-red-100 text-red-700 px-4 py-2 rounded">
                    <ul class="text-sm list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Nama -->
            <label class="block text-sm text-[#00391a] mb-1">Nama</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}"
                class="w-full mb-4 py-2 px-4 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#7bb35a]" />

            <!-- Email -->
            <label class="block text-sm text-[#00391a] mb-1">Email</label>
            <input type="email" value="{{ $user->email }}" readonly
                class="w-full mb-4 py-2 px-4 rounded-full border border-gray-300 bg-gray-100 text-gray-500" />

            <!-- Role -->
            <label class="block text-sm text-[#00391a] mb-1">Role</label>
            <input type="text" value="{{ $user->role }}" readonly
                class="w-full mb-4 py-2 px-4 rounded-full border border-gray-300 bg-gray-100 text-gray-500" />

            <!-- Password Baru -->
            <label class="block text-sm text-[#00391a] mb-1">Password Baru</label>
            <input type="password" name="password"
                class="w-full mb-4 py-2 px-4 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#7bb35a]" />

            <!-- Konfirmasi Password -->
            <label class="block text-sm text-[#00391a] mb-1">Konfirmasi Password</label>
            <input type="password" name="password_confirmation"
                class="w-full mb-6 py-2 px-4 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#7bb35a]" />

            <!-- Submit Update -->
            <button type="submit"
                class="w-full bg-[#00391a] text-white font-semibold rounded-full py-2 hover:bg-green-800 transition duration-300">
                Update Akun
            </button>
        </form>

        <!-- Bagian Kanan: Gambar / Info -->
        <div class="w-full lg:w-1/2 flex flex-col items-center justify-start">
            <div class="w-60 h-60 mb-6 relative flex items-center justify-center bg-[#00391a] rounded-lg shadow-inner">
                <!-- Menampilkan foto profil atau inisial jika foto tidak ada -->
                @if ($user->profile_photo)
         <img src="{{ asset('profile_photos/' . $user->profile_photo) }}" alt="Foto Profil"
                        class="w-full h-full object-cover rounded-lg">
                @else
                    <span class="text-white text-3xl font-bold">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </span>
                @endif
            </div>

            <!-- Form upload foto -->
            <form method="POST" action="{{ route('akun.update') }}" enctype="multipart/form-data">
                @csrf
                <label class="block text-sm text-[#00391a] mb-2">Ganti Foto Profil</label>
                <img id="preview" class="w-40 h-40 rounded-full object-cover mx-auto mb-4 hidden" />

                <input type="file" name="profile_photo" accept="image/*"
                    class="w-full text-sm mb-4 file:py-2 file:px-4 file:border-0 file:rounded-full file:bg-[#7bb35a] file:text-white file:cursor-pointer"
                    onchange="previewImage(event)" />


                <button type="submit" id="save-button" style="display: none;"
                    class="bg-[#00391a] text-white text-sm px-4 py-2 rounded-full hover:bg-green-800 transition">
                    Simpan Foto
                </button>
            </form>


            <!-- Delete Account Section -->
            <div class="w-full text-center mt-10">
                <h2 class="text-[#f9a825] font-semibold mb-2">Delete Account</h2>
                <p class="text-sm text-[#00391a] leading-snug mb-4">
                    Kamu dapat menghapus akun kamu secara permanen. Tindakan ini tidak dapat dibatalkan.
                </p>

                <!-- Form Delete Akun -->
                <form method="POST" action="{{ route('akun.destroy') }}"
                    onsubmit="return confirm('Apakah kamu yakin ingin menghapus akun? Ini tidak bisa dibatalkan.');">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="bg-red-600 text-white text-sm px-4 py-2 rounded-full hover:bg-red-700 transition">
                        Hapus Akun
                    </button>
                </form>
            </div>
        </div>
    </div>

    @include('components.footer')


    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('preview');

            if (file) {
                const reader = new FileReader();
                reader.onload = function() {
                    preview.src = reader.result;
                    preview.classList.remove('hidden');
                };
                reader.readAsDataURL(file);

                // Tampilkan tombol simpan
                document.getElementById('save-button').style.display = 'inline-block';
            } else {
                preview.src = '';
                preview.classList.add('hidden');
                document.getElementById('save-button').style.display = 'none';
            }
        }
    </script>

</body>

</html>
