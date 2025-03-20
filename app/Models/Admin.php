<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['username', 'password'];

    protected $hidden = ['password'];

    protected $casts = [
        'password' => 'hashed', // Laravel 11 auto-hashing support
    ];
}
