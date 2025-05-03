<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('akun', compact('user'));
    }
    public function update(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        // Cek jika hanya upload foto
        if ($request->hasFile('profile_photo')) {
            // Validasi hanya untuk foto
            $request->validate([
                'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Simpan file foto
            $path = $request->file('profile_photo')->store('profile_photos', 'public');
            $user->profile_photo = $path;



            $user->save();

            return back()->with('status', 'Foto profil berhasil diperbarui.');
        }

        // Validasi untuk update nama/password
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->name = $request->name;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return back()->with('status', 'Akun berhasil diperbarui.');
    }


    public function destroy(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        Auth::logout();

        $user->delete(); // ← Sekarang intelephense nggak protes lagi

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('status', 'Akun kamu telah dihapus.');
    }
}
