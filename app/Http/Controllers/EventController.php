<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Services\SupabaseService;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $now = Carbon::now();
        $search = $request->input('search');

        if ($search) {
            $events = collect();

            $otherEvents = Event::where(function ($query) use ($search) {
                $query->where('title', 'like', "%{$search}%")
                    ->orWhere('location', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            })
                ->orderBy('date', 'desc')
                ->paginate(6);

            // Kelompokkan berdasarkan tahun
            $groupedOtherEvents = $otherEvents->getCollection()->groupBy(function ($event) {
                return Carbon::parse($event->date)->year;
            });
            $otherEvents->setCollection($groupedOtherEvents);
        } else {
            // Upcoming events: tanggal >= hari ini
            $upcomingEvents = Event::where('date', '>=', $now)
                ->orderBy('date', 'asc')
                ->take(3)
                ->get();

            // Kelompokkan upcoming event berdasarkan tahun
            $events = $upcomingEvents->groupBy(function ($event) {
                return Carbon::parse($event->date)->year;
            });

            // Other events: tanggal < hari ini
            $otherEvents = Event::where('date', '<', $now)
                ->orderBy('date', 'desc')
                ->paginate(6);

            $groupedOtherEvents = $otherEvents->getCollection()->groupBy(function ($event) {
                return Carbon::parse($event->date)->year;
            });
            $otherEvents->setCollection($groupedOtherEvents);
        }

        return view('katalog.event', [
            'pageTitle' => 'Event',
            'events' => $events,
            'otherEvents' => $otherEvents,
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

        // Upload poster langsung ke public/posters/
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            // Membuat nama file unik
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            // Memindahkan file ke public/posters/
            $image->move(public_path('posters'), $imageName);
            // Simpan nama file di database
            $validated['poster'] = $imageName;
        }

        // Upload proposal
        if ($request->hasFile('proposal')) {
            $validated['proposal'] = $request->file('proposal')->store('proposals', 'public');
        }

        // Tambahkan user_id dari auth
        $validated['user_id'] = Auth::id();

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
            'title' => 'required|string|max:255',
            'type' => 'required|string|max:100',
            'date' => 'required|date',
            'participant_estimate' => 'required|integer|min:1',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $event->update($validated);

        return redirect()->route('event.show', $event->id)->with('success', 'Event berhasil diperbarui!');
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
