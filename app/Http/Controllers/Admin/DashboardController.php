<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\Sponsor;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil data pengguna yang sedang login
        $user = Auth::user();

        // Pastikan hanya superadmin yang bisa mengakses dashboard ini
        if ($user->role !== 'superadmin') {
            return redirect()->route('welcome')->with('error', 'Kamu tidak punya akses ke halaman ini.');
        }

        // Ambil semua data yang diperlukan
        $data = [
            'totalUsers' => User::count(),
            'totalEvents' => Event::count(),
            'totalSponsors' => Sponsor::count(),
            'events' => Event::all(),
            'users' => User::all(),
            'sponsors' => Sponsor::all(),
        ];

        // Kembalikan data ke view
        return view('dashboard', $data);
    }

    public function editEvent($id)
    {
        $event = Event::findOrFail($id);
        return view('katalog.event-edit', compact('event')); // Menampilkan form edit
    }

    public function updateEvent(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string|max:100',
            'date' => 'required|date',
            'participant_estimate' => 'required|integer|min:1',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $event->update($validated);

        return redirect()->route('dashboard')->with('success', 'Event berhasil diperbarui!');
    }


    public function updateSponsor(Request $request, $id)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'company_type' => 'nullable|string|max:100',
        ]);

        $sponsor = Sponsor::findOrFail($id);


        // Update sponsor
        $sponsor->update($validated);

        return redirect()->route('dashboard')->with('success', 'Sponsor berhasil diperbarui.');
    }


    public function deleteSponsor($id)
    {
        $sponsor = Sponsor::findOrFail($id);
        $sponsor->delete();

        return redirect()->route('dashboard')->with('success', 'Sponsor berhasil dihapus.');
    }


    public function deleteEvent($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('dashboard')->with('success', 'Event berhasil dihapus!');
    }
    public function destroyUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('dashboard')->with('success', 'User berhasil dihapus.');
    }

    public function updateUser(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'role' => 'required|in:user,superadmin',
        ]);

        $user = User::findOrFail($id);
        $user->update($validated);

        return redirect()->route('dashboard')->with('success', 'User berhasil diperbarui.');
    }
}
