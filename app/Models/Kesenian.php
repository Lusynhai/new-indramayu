<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kesenian extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'lokasi', 'deskripsi',];

    public function galleries()
    {
        return $this->hasMany(Galeri::class);
    }
}
