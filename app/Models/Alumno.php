<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model {
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'phone', 'resume_file_path', 'cv_generated_path'
    ];
}
