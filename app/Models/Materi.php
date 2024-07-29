<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'modul_id'];

    public function modul()
    {
        return $this->belongsTo(Modul::class);
    }
}
