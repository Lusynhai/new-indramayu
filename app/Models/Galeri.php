<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    // Kolom yang bisa diisi
    protected $fillable = ['tradisi_id', 'cagar_budaya_id', 'kesenian_id', 'file_path'];

    public function tradisi()
    {
        return $this->belongsTo(Tradisi::class);
    }

    public function cagarBudaya()
    {
        return $this->belongsTo(CagarBudaya::class, 'cagar_budaya_id');
    }

    public function kesenian()
    {
        return $this->belongsTo(Kesenian::class, 'kesenian_id');
    }

    protected $table = 'galleries'; // Pastikan nama tabelnya benar
}
