<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CagarBudaya extends Model
{
    use HasFactory;

    protected $table = 'cagarbudayas'; // Menetapkan nama tabel

    protected $fillable = ['nama', 'deskripsi', 'lokasi'];

    public function galleries()
    {
        return $this->hasMany(Galeri::class);
    }

    public function nationalCategories()
    {
        return $this->belongsToMany(NationalCategory::class, 'national_category_cagar_budaya');
    }
    public function provinsiCategories()
    {
        return $this->belongsToMany(ProvinsiCategory::class, 'provinsi_category_cagar_budaya');
    }
}
