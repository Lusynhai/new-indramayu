<?php
namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\Wbtbnas;
use App\Models\Wbtbprov;
use App\Models\Wbtbkab;
use Illuminate\Http\Request;

class MasyarakatController extends Controller
{
    public function index()
    {
        // dd('test');
        $wbtbnas = Wbtbnas::all();
        $wbtbprov = Wbtbprov::all();
        $wbtbkab = Wbtbkab::all();
        $pengajuans = Pengajuan::all();
        $data =['wbtbnas' => $wbtbnas, 'wbtbprov' => $wbtbprov, 'wbtbkab' => $wbtbkab, 'pengajuans' => $pengajuans] ;
        return view('masyarakat.index', $data);
    }
    
}