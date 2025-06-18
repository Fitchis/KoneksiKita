<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#004225] leading-tight">
            {{ __('Dashboard Superadmin') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Welcome Card -->
            <div class="bg-white p-6 rounded-2xl shadow-md">
                <h3 class="text-xl font-bold text-gray-800">Selamat datang, {{ Auth::user()->name }} 👋</h3>
                <p class="text-gray-600 mt-1">Ini adalah dashboard superadmin. Kelola data dengan efisien dan cepat.</p>
            </div>
            @if ($errors->any())
                <div class="text-red-600 text-sm mb-2">
                    {{ $errors->first() }}
                </div>
            @endif

            <!-- Statistik Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                <!-- Card Total Users -->
                <div
                    class="w-full bg-gradient-to-r from-emerald-700 to-emerald-500 text-white p-5 rounded-2xl shadow-md transition-all duration-300 ease-in-out hover:shadow-xl">
                    <div class="text-sm flex items-center gap-2 font-medium">
                        <i class="fas fa-users text-lg"></i>
                        Total Users
                    </div>
                    <div class="text-3xl sm:text-4xl font-bold mt-2 truncate">{{ $totalUsers }}</div>
                </div>

                <!-- Card Total Events -->
                <div
                    class="w-full bg-gradient-to-r from-sky-600 to-sky-400 text-white p-5 rounded-2xl shadow-md transition-all duration-300 ease-in-out hover:shadow-xl">
                    <div class="text-sm flex items-center gap-2 font-medium">
                        <i class="fas fa-calendar-alt text-lg"></i>
                        Total Events
                    </div>
                    <div class="text-3xl sm:text-4xl font-bold mt-2 truncate">{{ $totalEvents }}</div>
                </div>

                <!-- Card Total Sponsors -->
                <div
                    class="w-full bg-gradient-to-r from-amber-600 to-amber-400 text-white p-5 rounded-2xl shadow-md transition-all duration-300 ease-in-out hover:shadow-xl">
                    <div class="text-sm flex items-center gap-2 font-medium">
                        <i class="fas fa-handshake text-lg"></i>
                        Total Sponsors
                    </div>
                    <div class="text-3xl sm:text-4xl font-bold mt-2 truncate">{{ $totalSponsors }}</div>
                </div>
            </div>


            <!-- Daftar Event -->
            <div class="bg-white p-6 rounded-2xl shadow-md">
                <h4 class="text-lg font-semibold text-gray-800 mb-4">Daftar Event</h4>
                <div class="w-full overflow-x-auto">
                    <div class="min-w-[600px]">
                        <table class="table-auto w-full text-sm border-collapse bg-white">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th
                                        class="px-4 py-2 text-left font-semibold text-gray-700 border-b whitespace-nowrap">
                                        Judul</th>
                                    <th
                                        class="px-4 py-2 text-left font-semibold text-gray-700 border-b whitespace-nowrap">
                                        Tanggal</th>
                                    <th
                                        class="px-4 py-2 text-left font-semibold text-gray-700 border-b whitespace-nowrap">
                                        Lokasi</th>
                                    <th
                                        class="px-4 py-2 text-left font-semibold text-gray-700 border-b whitespace-nowrap">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($events as $event)
                                    <tr class="hover:bg-gray-50 transition duration-150">
                                        <td class="px-4 py-2 text-gray-800 border-b break-words max-w-[200px]">
                                            {{ $event->title }}
                                        </td>
                                        <td class="px-4 py-2 text-gray-800 border-b whitespace-nowrap">
                                            {{ \Carbon\Carbon::parse($event->date)->format('d M Y') }}
                                        </td>
                                        <td class="px-4 py-2 text-gray-800 border-b break-words max-w-[200px]">
                                            {{ $event->location }}
                                        </td>
                                        <td class="px-4 py-2 text-gray-800 border-b">
                                            <div class="flex flex-col gap-1 md:flex-row md:items-center">
                                                <!-- Edit Button -->
                                                <button
                                                    class="text-blue-600 hover:text-blue-800 font-medium edit-event-btn"
                                                    data-id="{{ $event->id }}" data-title="{{ $event->title }}"
                                                    data-location="{{ $event->location }}"
                                                    data-date="{{ $event->date }}" data-type="{{ $event->type }}"
                                                    data-participant_estimate="{{ $event->participant_estimate }}"
                                                    data-description="{{ $event->description }}">
                                                    Edit
                                                </button>
                                                <!-- Delete Button -->
                                                <form action="{{ route('dashboard.event.delete', $event->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Yakin ingin menghapus event ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="text-red-600 hover:text-red-800 font-medium">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Modal Edit Event -->
                <div id="editEventModal"
                    class="fixed inset-0 z-50 hidden bg-gray-800 bg-opacity-50 flex justify-center items-center">
                    <div class="bg-white p-8 rounded-xl shadow-lg w-96">
                        <h3 class="text-xl font-bold text-gray-800 mb-4">Edit Event</h3>
                        <form id="editEventForm" action="{{ route('dashboard.event.update', 'temp_id') }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <div class="space-y-6">
                                <div>
                                    <label for="editTitle" class="block text-sm font-medium text-gray-700">Judul</label>
                                    <input type="text" name="title" id="editTitle"
                                        class="mt-1 block w-full p-2 border rounded-md">
                                </div>

                                <div>
                                    <label for="editLocation"
                                        class="block text-sm font-medium text-gray-700">Lokasi</label>
                                    <input type="text" name="location" id="editLocation"
                                        class="mt-1 block w-full p-2 border rounded-md">
                                </div>

                                <div>
                                    <label for="editDate"
                                        class="block text-sm font-medium text-gray-700">Tanggal</label>
                                    <input type="date" name="date" id="editDate"
                                        class="mt-1 block w-full p-2 border rounded-md">
                                </div>
                                <div>
                                    <label for="editType" class="block text-sm font-medium text-gray-700">Tipe</label>
                                    <input type="text" name="type" id="editType"
                                        class="mt-1 block w-full p-2 border rounded-md">
                                </div>

                                <div>
                                    <label for="editParticipantEstimate"
                                        class="block text-sm font-medium text-gray-700">Perkiraan Peserta</label>
                                    <input type="number" name="participant_estimate" id="editParticipantEstimate"
                                        class="mt-1 block w-full p-2 border rounded-md">
                                </div>

                                <div>
                                    <label for="editDescription"
                                        class="block text-sm font-medium text-gray-700">Deskripsi</label>
                                    <textarea name="description" id="editDescription" class="mt-1 block w-full p-2 border rounded-md"></textarea>
                                </div>

                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Simpan
                                    Perubahan</button>
                                <button type="button" id="closeModalBtn"
                                    class="bg-gray-500 text-white px-4 py-2 rounded-md ml-2">Batal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Daftar Sponsor -->
            <div class="bg-white p-6 rounded-2xl shadow-md">
                <h4 class="text-lg font-semibold text-gray-800 mb-4">Daftar Sponsor</h4>
                <div class="w-full overflow-x-auto">
                    <div class="min-w-[600px]">
                        <table class="table-auto w-full text-sm border-collapse bg-white">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th
                                        class="px-4 py-2 text-left font-semibold text-gray-700 border-b whitespace-nowrap">
                                        Nama Sponsor</th>
                                    <th
                                        class="px-4 py-2 text-left font-semibold text-gray-700 border-b whitespace-nowrap">
                                        Kategori</th>
                                    <th
                                        class="px-4 py-2 text-left font-semibold text-gray-700 border-b whitespace-nowrap">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sponsors as $sponsor)
                                    <tr class="hover:bg-gray-50 transition duration-150">
                                        <td class="px-4 py-2 text-gray-800 border-b break-words max-w-[200px]">
                                            {{ $sponsor->name }}
                                        </td>
                                        <td class="px-4 py-2 text-gray-800 border-b break-words max-w-[200px]">
                                            {{ $sponsor->company_type ?? '-' }}
                                        </td>
                                        <td class="px-4 py-2 text-gray-800 border-b">
                                            <div class="flex flex-col gap-1 md:flex-row md:items-center">
                                                <button
                                                    onclick="openEditSponsorModal({{ $sponsor->id }}, '{{ $sponsor->name }}', '{{ $sponsor->company_type ?? '' }}')"
                                                    class="text-blue-600 hover:text-blue-800 font-medium">
                                                    Edit
                                                </button>
                                                <form action="{{ route('sponsor.delete', $sponsor->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Yakin ingin menghapus sponsor ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="text-red-600 hover:text-red-800 font-medium">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Modal Edit Sponsor -->
                <div id="editSponsorModal"
                    class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
                    <div class="bg-white rounded-xl shadow-lg p-6 w-full max-w-md">
                        <h2 class="text-lg font-semibold mb-4">Edit Sponsor</h2>
                        <form id="editSponsorForm" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <input type="hidden" id="editSponsorId" name="id">

                            <div class="mb-4">
                                <label for="editSponsorName"
                                    class="block text-sm font-medium text-gray-700">Nama</label>
                                <input type="text" id="editSponsorName" name="name"
                                    class="mt-1 block w-full border rounded-md p-2">
                            </div>

                            <div class="mb-4">
                                <label for="editSponsorCategory"
                                    class="block text-sm font-medium text-gray-700">Kategori</label>
                                <input type="text" id="editSponsorCategory" name="company_type"
                                    class="mt-1 block w-full border rounded-md p-2">
                            </div>

                            <div class="flex justify-end gap-2">
                                <button type="button" onclick="closeEditSponsorModal()"
                                    class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Batal</button>
                                <button type="submit"
                                    class="px-4 py-2 bg-[#004225] text-white rounded hover:bg-green-700">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Daftar Users -->
            <div class="bg-white p-6 rounded-2xl shadow-md">
                <h4 class="text-xl font-bold text-gray-800 mb-4">Daftar Users</h4>

                <div class="w-full overflow-x-auto">
                    <div class="min-w-[600px]">
                        <table class="table-auto w-full text-sm border-collapse bg-white">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th
                                        class="px-4 py-2 text-left font-semibold text-gray-700 border-b whitespace-nowrap">
                                        Aksi</th>
                                    <th
                                        class="px-4 py-2 text-left font-semibold text-gray-700 border-b whitespace-nowrap">
                                        Nama</th>
                                    <th
                                        class="px-4 py-2 text-left font-semibold text-gray-700 border-b whitespace-nowrap">
                                        Email</th>
                                    <th
                                        class="px-4 py-2 text-left font-semibold text-gray-700 border-b whitespace-nowrap">
                                        Role</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr class="hover:bg-gray-50 transition duration-150">
                                        <td
                                            class="px-4 py-2 text-gray-800 border-b flex flex-col gap-1 md:flex-row md:items-center">
                                            <button
                                                onclick="openEditUserModal({{ $user->id }}, '{{ $user->name }}', '{{ $user->email }}', '{{ $user->role }}')"
                                                class="text-blue-600 hover:text-blue-800 font-medium">Edit</button>
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                                class="inline"
                                                onsubmit="return confirm('Yakin ingin menghapus user ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-red-600 hover:text-red-800 font-medium">Hapus</button>
                                            </form>
                                        </td>
                                        <td class="px-4 py-2 text-gray-800 border-b break-words max-w-[200px]">
                                            {{ $user->name }}</td>
                                        <td class="px-4 py-2 text-gray-800 border-b break-words max-w-[250px]">
                                            {{ $user->email }}</td>
                                        <td class="px-4 py-2 text-gray-800 border-b capitalize">{{ $user->role }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Modal Edit User -->
            <div id="editUserModal"
                class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
                <div class="bg-white rounded-xl shadow-lg p-6 w-full max-w-md mx-4 md:mx-auto">
                    <h2 class="text-lg font-semibold mb-4">Edit User</h2>
                    <form id="editUserForm" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="editUserId" name="id">

                        <div class="mb-4">
                            <label for="editUserName" class="block text-sm font-medium text-gray-700">Nama</label>
                            <input type="text" id="editUserName" name="name"
                                class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring-green-600 focus:border-green-600">
                        </div>

                        <div class="mb-4">
                            <label for="editUserEmail" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" id="editUserEmail" name="email"
                                class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring-green-600 focus:border-green-600">
                        </div>

                        <div class="mb-4">
                            <label for="editUserRole" class="block text-sm font-medium text-gray-700">Role</label>
                            <select id="editUserRole" name="role"
                                class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring-green-600 focus:border-green-600">
                                <option value="user">User</option>
                                <option value="superadmin">Superadmin</option>
                            </select>
                        </div>

                        <div class="flex justify-end gap-2">
                            <button type="button" onclick="closeEditUserModal()"
                                class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Batal</button>
                            <button type="submit"
                                class="px-4 py-2 bg-green-700 text-white rounded hover:bg-green-800">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.edit-event-btn').forEach(button => {
            button.addEventListener('click', function() {
                const eventId = this.dataset.id;
                const form = document.getElementById('editEventForm');
                form.action = `{{ url('/event') }}/${eventId}`;

                // Isi nilai form dari data attribute
                document.getElementById('editTitle').value = this.dataset.title;
                document.getElementById('editLocation').value = this.dataset.location;
                document.getElementById('editDate').value = this.dataset.date;
                document.getElementById('editType').value = this.dataset.type;
                document.getElementById('editParticipantEstimate').value = this.dataset
                    .participant_estimate;
                document.getElementById('editDescription').value = this.dataset.description;

                // Tampilkan modal
                document.getElementById('editEventModal').classList.remove('hidden');
            });
        });

        // Tombol batal menutup modal
        document.getElementById('closeModalBtn').addEventListener('click', function() {
            document.getElementById('editEventModal').classList.add('hidden');
        });
    </script>

    <script>
        function openEditUserModal(id, name, email, role) {
            document.getElementById('editUserId').value = id;
            document.getElementById('editUserName').value = name;
            document.getElementById('editUserEmail').value = email;
            document.getElementById('editUserRole').value = role;

            const form = document.getElementById('editUserForm');
            form.action = `/user/${id}`;

            document.getElementById('editUserModal').classList.remove('hidden');
            document.getElementById('editUserModal').classList.add('flex');
        }

        function closeEditUserModal() {
            document.getElementById('editUserModal').classList.remove('flex');
            document.getElementById('editUserModal').classList.add('hidden');
        }
    </script>

    <script>
        function openEditSponsorModal(id, name, companyType) {
            // Reset form sebelum diisi
            document.getElementById('editSponsorForm').reset();

            // Set form values
            document.getElementById('editSponsorId').value = id;
            document.getElementById('editSponsorName').value = name;
            document.getElementById('editSponsorCategory').value = companyType;

            // Atur form action secara dinamis
            const form = document.getElementById('editSponsorForm');
            form.action = '/dashboard/sponsor/' + id;

            // Tampilkan modal
            document.getElementById('editSponsorModal').classList.remove('hidden');
            document.getElementById('editSponsorModal').classList.add('flex');
        }

        function closeEditSponsorModal() {
            document.getElementById('editSponsorModal').classList.remove('flex');
            document.getElementById('editSponsorModal').classList.add('hidden');
        }
    </script>

</x-app-layout>
