<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    Protected $fillable = [
        'course_code',
        'course_name',
        'description',
        'units',
    ];
}
