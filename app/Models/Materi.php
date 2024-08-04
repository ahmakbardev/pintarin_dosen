<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;

    public function modul()
    {
        return $this->belongsTo(Modul::class);
    }

    protected $fillable = [
        'title', 'content', 'url', 'file', 'modul_id', 'dosen_id'
    ];

    // Relasi dengan dosen
    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }
}
