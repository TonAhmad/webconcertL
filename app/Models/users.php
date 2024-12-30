<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class users extends Authenticatable
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'user';
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'user_name',
        'phone',
        'email',
        'password',
        'id_card',
    ];

    protected $hidden = [
        'password',
    ];
}
