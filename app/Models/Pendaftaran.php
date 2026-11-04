<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'course_id',
    ];

    // Relasi ke Course
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}