<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $table = 'admin'; // Nama tabel
    protected $primaryKey = 'admin_id'; // Primary key tabel

    public $incrementing = false; // Karena primary key adalah string
    protected $keyType = 'string'; // Tipe primary key

    protected $fillable = [
        'admin_id',
        'username',
        'password',
    ];

    protected $hidden = [
        'password',
    ];
}
