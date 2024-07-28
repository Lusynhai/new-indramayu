<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'deskripsi', 'lokasi', 'email', 'options', 'status', 'user_id',
    ];

    protected $casts = [
        'options' => 'array', // Meng-cast kolom options sebagai array
    ];
}
