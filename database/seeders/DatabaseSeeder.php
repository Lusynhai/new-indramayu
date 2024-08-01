<?php
namespace Database\Seeders;

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
    }
}
