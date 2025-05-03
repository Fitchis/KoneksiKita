<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {
        // Ambil semua event dari database
        $events = Event::all();

        // Kirimkan data ke view
        return view('katalog.event', [
            'pageTitle' => 'Event',
            'events' => $events
        ]);
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);

        $event->date = \Carbon\Carbon::parse($event->date);

        $proposal = $event->proposal; // Ambil nama file proposal dari DB

        return view('katalog.event-show', compact('event', 'proposal'));
    }


    public function create()
    {
        return view('katalog.event', [
            'pageTitle' => 'Tambah Event'
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string|max:100',
            'date' => 'required|date',
            'participant_estimate' => 'required|integer|min:1',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'contact_name' => 'required|string|max:100',
            'contact_position' => 'required|string|max:100',
            'contact_whatsapp' => 'required|string|max:20',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'proposal' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
        ]);

        // Upload poster
        if ($request->hasFile('image')) {
            $validated['poster'] = $request->file('image')->store('posters', 'public');
        }

        // Upload proposal
        if ($request->hasFile('proposal')) {
            $validated['proposal'] = $request->file('proposal')->store('proposals', 'public');
        }

        // Tambahkan user_id dari auth
        $validated['user_id'] = Auth::id(); // Benar


        // Simpan ke database
        Event::create($validated);

        return redirect()->route('katalog.event')->with('success', 'Event berhasil diposting!');
    }


    public function edit($id)
    {
        // Redirect saja atau bisa hapus fungsi ini jika tidak digunakan
        return redirect()->route('dashboard')->with('error', 'Edit event sekarang dilakukan di halaman dengan popup.');
    }


    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $validated = $request->validate([
            'location' => 'required|string|max:255',
        ]);

        $event->update($validated);

        return redirect()->route('katalog.event')->with('success', 'Lokasi event berhasil diperbarui!');
    }
    public function destroy($id)
    {
        // Temukan event berdasarkan ID
        $event = Event::findOrFail($id);

        // Hapus event
        $event->delete();

        // Redirect kembali ke halaman event dengan pesan sukses
        return redirect()->route('dashboard')->with('success', 'Event berhasil dihapus!');
    }
}
