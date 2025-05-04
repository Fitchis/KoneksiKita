<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SponsorController extends Controller
{
    public function index()
    {
        $sponsors = Sponsor::latest()->get(); // ambil semua sponsor dari DB
        return view('katalog.sponsor', compact('sponsors'));
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
            $logo->move(public_path('sponsor_logos'), $filename);
            $sponsor->logo = $filename; // hanya nama file, tanpa path
        }

        $sponsor->save();

        return redirect()->route('katalog.sponsor')->with('success', 'Sponsor berhasil ditambahkan!');
    }
}
