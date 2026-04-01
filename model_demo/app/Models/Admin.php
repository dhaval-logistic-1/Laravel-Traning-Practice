<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = [
        'frist_name',
        'last_name',
        'email',
        'gender',
        'phone',
        'is_active',
        'created_at',
        'updated_at',

    ];
}
