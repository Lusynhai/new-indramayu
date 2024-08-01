<?php

namespace App\Http\Controllers;

use App\Models\ObjekBudaya;
use Illuminate\Http\Request;

class MasyarakatController extends Controller
{
    public function index()
    {
        // Mengambil semua data ObjekBudaya
        $wbtbs = ObjekBudaya::all();
        
        return view('masyarakat.index', ['wbtbs' => $wbtbs]);
    }

    public function showDetails($id)
    {
        // Mengambil data ObjekBudaya berdasarkan id
        $wbtb = ObjekBudaya::findOrFail($id);

        return view('masyarakat.wbtb.detail', ['wbtb' => $wbtb]);
    }
}
