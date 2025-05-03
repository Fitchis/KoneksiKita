<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_event',
        'email',
        'no_telp',
        'jenis_acara',
        'lokasi',
    ];
}
