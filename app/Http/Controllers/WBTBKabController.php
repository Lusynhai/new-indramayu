<?php
namespace App\Http\Controllers;

use App\Models\Wbtbkab;
use App\Models\Galeri;
use App\Models\PengajuanObjekBudaya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WBTBKabController extends Controller
{
    public function index()
    {
        $wbtbkab = Wbtbkab::all();
        return view('admin.wbtbkab.index', compact('wbtbkab'));
    }

    public function create()
    {
        return view('admin.wbtbkab.create');
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

        $wbtbkab = new Wbtbkab();
        $wbtbkab->nama = $request->nama;
        $wbtbkab->deskripsi = $request->deskripsi;
        $wbtbkab->lokasi = $request->lokasi;
        $wbtbkab->kategori_id = $request->kategori_id;
        $wbtbkab->save();

        if ($request->hasFile('galeri')) {
            foreach ($request->file('galeri') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->storeAs('public/galeri', $imageName);

                $wbtbkab->galleries()->create(['file_path' => $imageName]);
            }
        }

        return redirect()->route('wbtbkab.index')->with('success', 'Data berhasil disimpan.');
    }

    public function show(Wbtbkab $wbtbkab)
    {
        return view('admin.wbtbkab.show', compact('wbtbkab'));
    }

    public function edit($id)
    {
        $wbtbkab = Wbtbkab::findOrFail($id);
        return view('admin.wbtbkab.edit', compact('wbtbkab'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'lokasi' => 'required',
            'galeri.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $wbtbkab = Wbtbkab::findOrFail($id);
        $wbtbkab->nama = $request->nama;
        $wbtbkab->deskripsi = $request->deskripsi;
        $wbtbkab->lokasi = $request->lokasi;
        $wbtbkab->save();

        if ($request->hasFile('galeri')) {
            foreach ($request->file('galeri') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->storeAs('public/galeri', $imageName);

                $wbtbkab->galleries()->create(['file_path' => $imageName]);
            }
        }

        return redirect()->route('wbtbkab.index')->with('success', 'Data berhasil diupdate.');
    }

    public function destroy(Wbtbkab $wbtbkab)
    {
        foreach ($wbtbkab->galleries as $galeri) {
            Storage::delete('public/galeri/' . basename($galeri->file_path));
        }

        $wbtbkab->delete();

        return redirect()->route('wbtbkab.index')->with('success', 'Adat deleted successfully.');
    }

    public function showDetails($id)
    {
        $wbtbkab = Wbtbkab::findOrFail($id);
        return view('masyarakat.wbtbkab.detail', compact('wbtbkab'));
    }
}