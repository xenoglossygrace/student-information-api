<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
      Protected $fillable = [
        'name',
        'birth_date',
        'email',
        'phone_number',
        'address',
    ];
}
