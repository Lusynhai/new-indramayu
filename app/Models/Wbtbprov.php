<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wbtbprov extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'deskripsi',
        'lokasi',
        'galeri',
        'kategori_id',
    ];

    public function galleries()
    {
        return $this->hasMany(Galeri::class, 'objek_budaya_id');
    }
}
