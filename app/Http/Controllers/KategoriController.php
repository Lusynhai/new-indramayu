<?php

namespace App\Http\Controllers;

use App\Models\Tradisi;
use App\Models\CagarBudaya;
use App\Models\Kesenian;
use App\Models\ObjekBudayaKategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        // $tradisis = Tradisi::with(['nationalCategories', 'provinsiCategories'])->get();
        // $cagarBudayas = CagarBudaya::with(['nationalCategories', 'provinsiCategories'])->get();
        // $kesenians = Kesenian::with(['nationalCategories', 'provinsiCategories'])->get();
        $kategori = ObjekBudayaKategori::all();
        $data['kategori'] = $kategori;

        return view('admin.kategori.index', $data);
    }

    public function show($type, $id)
    {
        $model = $this->getModel($type);
        $kategori = $model::with(['nationalCategories', 'provinsiCategories'])->findOrFail($id);

        return view('masyarakat.show', compact('kategori'));
    }

    private function getModel($type)
    {
        switch ($type) {
            case 'tradisi':
                return Tradisi::class;
            case 'cagar_budaya':
                return CagarBudaya::class;
            case 'kesenian':
                return Kesenian::class;
            default:
                abort(404);
        }
    }
}
