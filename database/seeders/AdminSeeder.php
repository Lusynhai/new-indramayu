<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run()
    {
        // Menambahkan admin dengan data default
        User::create([
            'name' => 'Admin',
            'email' => 'admin@disbud.com',
            'password' => Hash::make('admindisbud'), // Gunakan password yang kuat
        ]);
    }
}
