<?php
namespace Database\Seeders;

use App\Models\ObjekBudayaKategori;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Seeder lain
        $this->call([
            AdminSeeder::class,
            // Seeder lainnya
        ]);
        ObjekBudayaKategori::create(
            [
                'nama'=>'Sejarah/Tradisi'
            ]
        );
        ObjekBudayaKategori::create(
            [
                'nama'=>'Cagar Budaya'
            ]
        );
        ObjekBudayaKategori::create(
            [
                'nama'=>'Kesenian'
            ]
        );
    }
}
