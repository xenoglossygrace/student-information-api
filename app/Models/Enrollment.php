<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'name',
        'course_id',
        'semester',
        'year',
        'block',
        'status',
        'grade',
    ];

    public function student()
{
    return $this->belongsTo(\App\Models\Student::class, 'student_id');
}

public function course()
{
    return $this->belongsTo(\App\Models\Course::class, 'course_id');
}

}
