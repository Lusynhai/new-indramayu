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

    public function nationalCategories()
    {
        return $this->belongsToMany(NationalCategory::class, 'national_category_kesenian');
    }
    public function provinsiCategories()
    {
        return $this->belongsToMany(ProvinsiCategory::class, 'kesenian_category_cagar_budaya');
    }
}
