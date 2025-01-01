<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'user'; // Tabel yang Anda buat
    protected $primaryKey = 'user_id'; // Sesuaikan dengan primary key

    protected $fillable = [
        'user_name', 'phone', 'email', 'password', 'id_card',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}

