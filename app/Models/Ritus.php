<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ritus extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'deskripsi', 'lokasi'];

    public function galleries()
    {
        return $this->hasMany(Galeri::class);
    }
}
