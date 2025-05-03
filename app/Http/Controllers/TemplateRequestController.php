<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TemplateRequest; // Model yang nanti kita buat

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

        // Setelah simpan, langsung redirect ke link Google Drive
        return redirect('https://drive.google.com/your-template-link');
    }
}
