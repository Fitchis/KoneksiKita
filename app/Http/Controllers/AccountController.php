<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

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

            // Hapus foto lama jika ada
            if ($user->profile_photo && File::exists(public_path($user->profile_photo))) {
                File::delete(public_path($user->profile_photo));
            }

            // Simpan file foto ke public/profile_photos/
            $profilePhoto = $request->file('profile_photo');
            $photoName = time() . '.' . $profilePhoto->getClientOriginalExtension();
            $profilePhoto->move(public_path('profile_photos'), $photoName);

            // Simpan nama file foto di database
            $user->profile_photo = $photoName;
            $user->save();

            return back()->with('status', 'Foto profil berhasil diperbarui.');
        }

        // Validasi untuk update nama/password
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Update nama pengguna
        $user->name = $request->name;

        // Update password jika diisi
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

        // Hapus foto profil jika ada
        if ($user->profile_photo && File::exists(public_path($user->profile_photo))) {
            File::delete(public_path($user->profile_photo));
        }

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('status', 'Akun kamu telah dihapus.');
    }
}
