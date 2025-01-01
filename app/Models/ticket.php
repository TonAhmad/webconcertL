<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ticket extends Model
{
    use HasFactory;

    // Tentukan nama tabel secara eksplisit
    protected $table = 'ticket';

    // Jika primary key Anda bukan "id", tambahkan ini
    protected $primaryKey = 'ticket_id';

    // Jika primary key bukan auto increment, tambahkan ini
    public $incrementing = true;

    // Jika primary key menggunakan tipe data string
    protected $keyType = 'int';
}
