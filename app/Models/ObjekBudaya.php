<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ObjekBudaya extends Model
{
    protected $table = 'objek_budayas'; // Nama tabel yang sesuai di database

    protected $fillable = [
        'nama', 'deskripsi', 'lokasi', 'status',
    ];

    public function galleries()
    {
        return $this->hasMany(Galeri::class, 'objek_budaya_id');
    }
}
