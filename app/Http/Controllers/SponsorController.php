<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SponsorController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            // Jika sedang mencari, tampilkan hasil pencarian tanpa mainSponsors
            $mainSponsors = collect(); // kosongkan
            $otherSponsors = Sponsor::where('name', 'like', "%{$search}%")
                ->orderBy('created_at', 'desc')
                ->paginate(6);
        } else {
            // Jika tidak sedang mencari, tampilkan 3 sponsor utama + sisanya
            $mainSponsors = Sponsor::latest()->take(3)->get();
            $otherSponsors = Sponsor::whereNotIn('id', $mainSponsors->pluck('id'))
                ->orderBy('created_at', 'desc')
                ->paginate(6);
        }

        return view('katalog.sponsor', [
            'pageTitle' => 'Sponsor',
            'mainSponsors' => $mainSponsors,
            'otherSponsors' => $otherSponsors,
        ]);
    }




    public function show($id)
    {
        $sponsor = Sponsor::findOrFail($id);

        return view('katalog.sponsor-show', compact('sponsor'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'company_type' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'description' => 'required|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // maksimal 2MB
        ]);

        $sponsor = new Sponsor();
        $sponsor->user_id = Auth::id();
        $sponsor->name = $validated['name'];
        $sponsor->company_type = $validated['company_type'] ?? null;
        $sponsor->location = $validated['location'] ?? null;
        $sponsor->phone = $validated['phone'] ?? null;
        $sponsor->email = $validated['email'] ?? null;
        $sponsor->description = $validated['description'];

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $filename = time() . '.' . $logo->getClientOriginalExtension();
            $logo->move(base_path('../public_html/sponsor_logos'), $filename);
            $sponsor->logo = $filename;
        }

        $sponsor->save();

        return redirect()->route('katalog.sponsor')->with('success', 'Sponsor berhasil ditambahkan!');
    }
}
