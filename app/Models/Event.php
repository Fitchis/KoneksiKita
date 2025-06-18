<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'type',
        'date',
        'participant_estimate',
        'location',
        'contact_name',
        'contact_position',
        'contact_whatsapp',
        'description',
        'poster',
        'proposal',
    ];

    // Menambahkan kolom date ke properti $dates agar Laravel otomatis mengonversinya ke objek Carbon
    protected $dates = ['date'];

    // Relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getIsFinishedAttribute()
    {
        return $this->date < now();
    }
}
