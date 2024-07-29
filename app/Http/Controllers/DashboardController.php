<?php

namespace App\Http\Controllers;

use App\Models\Adat;
use App\Models\CagarBudaya;
use App\Models\Ritus;
use App\Models\Kesenian;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        
        {
            $jumlahAdat = Adat::count(); // Atau logika lain untuk mendapatkan jumlah adat
            return view('dashboard', compact('jumlahAdat'));
        }
        // $jumlahCagarBudaya = CagarBudaya::count();
        // $jumlahRitus = Ritus::count();
        // $jumlahKesenian = Kesenian::count();

        // return view('admin.index', compact('jumlahAdat', 'jumlahCagarBudaya', 'jumlahRitus', 'jumlahKesenian'));
    }
}
