<?php
namespace App\Http\Controllers;

use App\Models\Wbtbnas;
use App\Models\Galeri;
use App\Models\PengajuanObjekBudaya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WBTBNasController extends Controller
{
    public function index()
    {
        $wbtbnas = Wbtbnas::all();
        return view('admin.wbtbnas.index', compact('wbtbnas'));
    }

    public function create()
    {
        return view('admin.wbtbnas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'lokasi' => 'required',
            'galeri' => 'nullable|file',
            'kategori_id' => 'required|integer',
        ]);

        $wbtbnas = new Wbtbnas();
        $wbtbnas->nama = $request->nama;
        $wbtbnas->deskripsi = $request->deskripsi;
        $wbtbnas->lokasi = $request->lokasi;
        $wbtbnas->kategori_id = $request->kategori_id;
        $wbtbnas->save();

        if ($request->hasFile('galeri')) {
            foreach ($request->file('galeri') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->storeAs('public/galeri', $imageName);

                $wbtbnas->galleries()->create(['file_path' => $imageName]);
            }
        }

        return redirect()->route('wbtbnas.index')->with('success', 'Data berhasil disimpan.');
    }

    public function show(Wbtbnas $wbtbnas)
    {
        return view('admin.wbtbnas.show', compact('wbtbnas'));
    }

    public function edit($id)
    {
        $wbtbnas = Wbtbnas::findOrFail($id);
        return view('admin.wbtbnas.edit', compact('wbtbnas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'lokasi' => 'required',
            'galeri.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $wbtbnas = Wbtbnas::findOrFail($id);
        $wbtbnas->nama = $request->nama;
        $wbtbnas->deskripsi = $request->deskripsi;
        $wbtbnas->lokasi = $request->lokasi;
        $wbtbnas->save();

        if ($request->hasFile('galeri')) {
            foreach ($request->file('galeri') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->storeAs('public/galeri', $imageName);

                $wbtbnas->galleries()->create(['file_path' => $imageName]);
            }
        }

        return redirect()->route('wbtbnas.index')->with('success', 'Data berhasil diupdate.');
    }

    public function destroy(Wbtbnas $wbtbnas)
    {
        foreach ($wbtbnas->galleries as $galeri) {
            Storage::delete('public/galeri/' . basename($galeri->file_path));
        }

        $wbtbnas->delete();

        return redirect()->route('wbtbnas.index')->with('success', 'Adat deleted successfully.');
    }

    public function showDetails($id)
    {
        $wbtbnas = Wbtbnas::findOrFail($id);
        return view('masyarakat.wbtbnas.detail', compact('wbtbnas'));
    }
}