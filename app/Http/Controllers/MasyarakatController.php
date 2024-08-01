<?php
namespace App\Http\Controllers;

use App\Models\Tradisi;
use App\Models\CagarBudaya;
use App\Models\Ritus;
use App\Models\Kesenian;
use Illuminate\Http\Request;

class MasyarakatController extends Controller
{
    public function index()
    {
        // dd('test');
        $tradisis = Tradisi::all();
        $cagarbudayas = Cagarbudaya::all();
        $kesenians = Kesenian::all();
        $data =['tradisis' => $tradisis, 'cagarbudayas'=> $cagarbudayas,  'kesenians' => $kesenians] ;
        return view('masyarakat.index', $data);
    }
    
}