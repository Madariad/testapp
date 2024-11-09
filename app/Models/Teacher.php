<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{
    public $timestamps = false;
    protected $fillable = [
        'name',
        'email',
        'password',
    ];


    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
}
