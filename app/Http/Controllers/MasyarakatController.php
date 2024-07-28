<?php
namespace App\Http\Controllers;

use App\Models\Adat;
use App\Models\CagarBudaya;
use App\Models\Ritus;
use App\Models\Kesenian;
use Illuminate\Http\Request;

class MasyarakatController extends Controller
{
    public function index()
    {
        // dd('test');
        $adats = Adat::all();
        $cagarbudayas = Cagarbudaya::all();
        $rituses = Ritus::all();
        $kesenians = Kesenian::all();
        $data =['adats' => $adats, 'cagarbudayas'=> $cagarbudayas,  'rituses' => $rituses, 'kesenians' => $kesenians] ;
        return view('masyarakat.index', $data);
    }
    
}