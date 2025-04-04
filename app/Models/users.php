<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class users extends Authenticatable
{
    use HasFactory;

    protected $table = 'user';  // Menyebutkan nama tabel yang digunakan

    protected $fillable = [
        'user_name',
        'phone',
        'email',
        'password',
        'id_card'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public $timestamps = false;
}
