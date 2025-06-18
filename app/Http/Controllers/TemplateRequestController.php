<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TemplateRequest;

class TemplateRequestController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama_event' => 'required|string',
            'email' => 'required|email',
            'no_telp' => 'required|string',
            'jenis_acara' => 'required|string',
            'lokasi' => 'required|string',
        ]);

        TemplateRequest::create($request->all());

        // Cek apakah file ada
        $filePath = public_path('templates/proposal-sponsorship.pdf');
        if (!file_exists($filePath)) {
            return response()->json(['error' => 'File tidak ditemukan.'], 404);
        }

        // Kirim URL download sebagai response JSON
        return response()->json([
            'success' => true,
            'download_url' => asset('templates/proposal-sponsorship.pdf'),
        ]);
    }
}
