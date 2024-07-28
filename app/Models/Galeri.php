<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Adat;

class Galeri extends Model
{
    use HasFactory;

    protected $fillable = ['adat_id', 'cagar_budaya_id','ritus_id', 'kesenian_id', 'file_path'];

    public function adat()
    {
        return $this->belongsTo(Adat::class);
    }

    public function cagarBudaya()
    {
        return $this->belongsTo(CagarBudaya::class, 'cagar_budaya_id');
    }
    public function ritus()
    {
        return $this->belongsTo(ritus::class, 'ritus_id');
    }
    public function kesenian()
    {
        return $this->belongsTo(kesenian::class, 'kesenian_id');
    
    }

    protected $table = 'galleries';
}
