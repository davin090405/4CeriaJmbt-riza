<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arsitek extends Model
{
    use HasFactory;

    protected $table = 'arsiteks'; // Nama tabel

    protected $fillable = [
        'user_id',  // Hubungan dengan users
        'alamat',
        'no_telepon',
        // Tambahkan field spesifik arsitek lainnya di sini
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
