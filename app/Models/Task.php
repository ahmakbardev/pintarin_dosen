<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['modul_id', 'title', 'description', 'kriteria_penilaian', 'due_date'];

    protected $casts = [
        'kriteria_penilaian' => 'array',
        'due_date' => 'date',
    ];

    public function modul()
    {
        return $this->belongsTo(Modul::class);
    }
}
