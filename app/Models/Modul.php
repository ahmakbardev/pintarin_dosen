<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modul extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'topic',
        'dosen_id', // Pastikan kolom ini ada di $fillable
    ];

    // Jika ada relasi dengan model Dosen, tambahkan di sini
    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }
}
