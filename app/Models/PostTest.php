<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostTest extends Model
{
    use HasFactory;

    protected $fillable = [
        'modul_id',
        'dosen_id',
        'question',
        'answers',
        'correct_answer',
        'description',
    ];

    protected $casts = [
        'answers' => 'array',
    ];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }
}
