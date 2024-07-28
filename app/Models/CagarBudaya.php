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
}
