<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tradisi extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'deskripsi', 'lokasi'];

    // Perbaiki nama metode menjadi galleries()
    public function galleries()
    {
        return $this->hasMany(Galeri::class);
    }

    public function nationalCategories()
    {
        return $this->belongsToMany(NationalCategory::class, 'national_category_tradisi');
    }

    public function provinsiCategories()
    {
        return $this->belongsToMany(ProvinsiCategory::class, 'provinsi_category_tradisi');
    }
}
