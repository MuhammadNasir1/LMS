<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gaming extends Model
{
    use HasFactory;
    protected $table = "gamings";

    protected $fillable = [
        'teacher_id',
        'student_id',
        'game_name',
        'recording',
        'description',


    ];

    protected $timestamp = true;
}
