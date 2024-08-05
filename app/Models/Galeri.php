<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $table = 'galleries'; // Nama tabel yang sesuai di database

    // protected $fillable = [
    //     'file_path', 'o'
    // ];

//     public function objekBudaya()
//     {
//         return $this->belongsTo(ObjekBudaya::class, 'objek_budaya_id');
//     // }
// }

public function wbtbnas()
{
    return $this->belongsTo(Wbtbnas::class);
}


public function wbtbprov()
{
    return $this->belongsTo(Wbtbprov::class);
}

public function wbtbkab()
{
    return $this->belongsTo(Wbtbkab::class);
}

}