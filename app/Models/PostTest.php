<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostTest extends Model
{
    use HasFactory;

    protected $fillable = [
        'modul_id',
        'question',
        'answers',
        'correct_answer',
        'description',
    ];

    protected $casts = [
        'answers' => 'array',
    ];
}
