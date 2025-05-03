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

            <!-- Statistik Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Card Total Users -->
                <div
                    class="bg-gradient-to-r from-[#004225] to-green-600 text-white p-6 rounded-2xl shadow-md transform hover:scale-105 transition-transform duration-300 ease-in-out">
                    <div class="text-sm flex items-center gap-2">
                        <i class="fas fa-users"></i> <!-- Ikon untuk Total Users -->
                        Total Users
                    </div>
                    <div class="text-3xl font-bold mt-1">{{ $totalUsers }}</div>
                </div>

                <!-- Card Total Events -->
                <div
                    class="bg-gradient-to-r from-yellow-400 to-yellow-500 text-[#004225] p-6 rounded-2xl shadow-md transform hover:scale-105 transition-transform duration-300 ease-in-out">
                    <div class="text-sm flex items-center gap-2">
                        <i class="fas fa-calendar-alt"></i> <!-- Ikon untuk Total Events -->
                        Total Events
                    </div>
                    <div class="text-3xl font-bold mt-1">{{ $totalEvents }}</div>
                </div>

                <!-- Card Total Sponsors -->
                <div
                    class="bg-gradient-to-r from-yellow-400 to-yellow-500 text-[#004225] p-6 rounded-2xl shadow-md transform hover:scale-105 transition-transform duration-300 ease-in-out">
                    <div class="text-sm flex items-center gap-2">
                        <i class="fas fa-handshake"></i> <!-- Ikon untuk Total Sponsors -->
                        Total Sponsors
                    </div>
                    <div class="text-3xl font-bold mt-1">{{ $totalSponsors }}</div>
                </div>
            </div>


            <!-- Daftar Event -->
            <div class="bg-white p-6 rounded-2xl shadow-md">
                <h4 class="text-lg font-semibold text-gray-800 mb-4">Daftar Event</h4>
                <table class="min-w-full table-auto">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-left text-sm font-semibold">Judul</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold">Tanggal</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold">Lokasi</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($events as $event)
                            <tr>
                                <td class="px-4 py-2">{{ $event->title }}</td>
                                <td class="px-4 py-2">{{ \Carbon\Carbon::parse($event->date)->format('d M Y') }}</td>
                                <td class="px-4 py-2">{{ $event->location }}</td>
                                <td class="px-4 py-2">
                                    <!-- Edit Button -->
                                    <button class="text-blue-500 hover:text-blue-700 edit-event-btn"
                                        data-id="{{ $event->id }}" data-title="{{ $event->title }}"
                                        data-location="{{ $event->location }}"
                                        data-date="{{ $event->date }}">Edit</button>

                                    <!-- Hapus Button -->
                                    <form action="{{ route('event.delete', $event->id) }}" method="POST"
                                        class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Daftar Sponsor -->
            <div class="bg-white p-6 rounded-2xl shadow-md">
                <h4 class="text-lg font-semibold text-gray-800 mb-4">Daftar Sponsor</h4>
                <table class="min-w-full table-auto">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-left text-sm font-semibold">Nama Sponsor</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold">Kategori</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sponsors as $sponsor)
                            <tr>
                                <td class="px-4 py-2">{{ $sponsor->name }}</td>
                                <td class="px-4 py-2">{{ $sponsor->company_type ?? '-' }}</td>
                                <td class="px-4 py-2 flex gap-2">
                                    <!-- Edit Button -->
                                    <button
                                        onclick="openEditSponsorModal({{ $sponsor->id }}, '{{ $sponsor->name }}', '{{ $sponsor->company_type ?? '' }}')"
                                        class="text-blue-500 hover:underline">Edit</button>


                                    <!-- Delete Form -->
                                    <form action="{{ route('sponsor.delete', $sponsor->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus sponsor ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
                            <label for="editSponsorName" class="block text-sm font-medium text-gray-700">Nama</label>
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


            <!-- Modal Edit Event -->
            <div id="editEventModal"
                class="fixed inset-0 z-50 hidden bg-gray-800 bg-opacity-50 flex justify-center items-center">
                <div class="bg-white p-8 rounded-xl shadow-lg w-96">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Edit Event</h3>
                    <form id="editEventForm" action="{{ route('event.update', 'temp_id') }}" method="POST">
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
                                <label for="editDate" class="block text-sm font-medium text-gray-700">Tanggal</label>
                                <input type="date" name="date" id="editDate"
                                    class="mt-1 block w-full p-2 border rounded-md">
                            </div>

                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Simpan
                                Perubahan</button>
                            <button type="button" id="closeModalBtn"
                                class="bg-gray-500 text-white px-4 py-2 rounded-md ml-2">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Daftar Users -->
            <div class="bg-white p-6 rounded-2xl shadow-md">
                <h4 class="text-lg font-semibold text-gray-800 mb-4">Daftar Users</h4>
                <table class="min-w-full table-auto">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-left text-sm font-semibold">Aksi</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold">Nama</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold">Email</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold">Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="px-4 py-2 space-x-2">
                                    <button
                                        onclick="openEditUserModal({{ $user->id }}, '{{ $user->name }}', '{{ $user->email }}', '{{ $user->role }}')"
                                        class="text-blue-500 hover:underline">Edit</button>

                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                        class="inline" onsubmit="return confirm('Yakin ingin menghapus user ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                                    </form>
                                </td>

                                <td class="px-4 py-2">{{ $user->name }}</td>
                                <td class="px-4 py-2">{{ $user->email }}</td>
                                <td class="px-4 py-2">{{ $user->role }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- Modal Edit User -->
                <div id="editUserModal"
                    class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
                    <div class="bg-white rounded-xl shadow-lg p-6 w-full max-w-md">
                        <h2 class="text-lg font-semibold mb-4">Edit User</h2>
                        <form id="editUserForm" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" id="editUserId" name="id">

                            <div class="mb-4">
                                <label for="editUserName" class="block text-sm font-medium text-gray-700">Nama</label>
                                <input type="text" id="editUserName" name="name"
                                    class="mt-1 block w-full border rounded-md p-2">
                            </div>

                            <div class="mb-4">
                                <label for="editUserEmail"
                                    class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" id="editUserEmail" name="email"
                                    class="mt-1 block w-full border rounded-md p-2">
                            </div>

                            <div class="mb-4">
                                <label for="editUserRole" class="block text-sm font-medium text-gray-700">Role</label>
                                <select id="editUserRole" name="role"
                                    class="mt-1 block w-full border rounded-md p-2">
                                    <option value="user">User</option>
                                    <option value="superadmin">Superadmin</option>
                                </select>
                            </div>

                            <div class="flex justify-end gap-2">
                                <button type="button" onclick="closeEditUserModal()"
                                    class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Batal</button>
                                <button type="submit"
                                    class="px-4 py-2 bg-[#004225] text-white rounded hover:bg-green-700">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.edit-event-btn').forEach(button => {
            button.addEventListener('click', function() {
                const eventId = this.dataset.id;
                const eventTitle = this.dataset.title;
                const eventLocation = this.dataset.location;
                const eventDate = this.dataset.date;

                // Set form action URL
                const form = document.getElementById('editEventForm');
                form.action = form.action.replace('temp_id', eventId);

                // Set form input values
                document.getElementById('editTitle').value = eventTitle;
                document.getElementById('editLocation').value = eventLocation;
                document.getElementById('editDate').value = eventDate;

                // Show the modal
                document.getElementById('editEventModal').classList.remove('hidden');
            });
        });

        // Close modal
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
    </script>




</x-app-layout>
