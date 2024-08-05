<?php
namespace App\Http\Controllers;

use App\Models\Wbtbprov;
use App\Models\Galeri;
use App\Models\PengajuanObjekBudaya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WBTBProvController extends Controller
{
    public function index()
    {
        $wbtbprov = Wbtbprov::all();
        return view('admin.wbtbprov.index', compact('wbtbprov'));
    }

    public function create()
    {
        return view('admin.wbtbprov.create');
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

        $wbtbprov = new Wbtbprov();
        $wbtbprov->nama = $request->nama;
        $wbtbprov->deskripsi = $request->deskripsi;
        $wbtbprov->lokasi = $request->lokasi;
        $wbtbprov->kategori_id = $request->kategori_id;
        $wbtbprov->save();

        if ($request->hasFile('galeri')) {
            foreach ($request->file('galeri') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->storeAs('public/galeri', $imageName);

                $wbtbprov->galleries()->create(['file_path' => $imageName]);
            }
        }

        return redirect()->route('wbtbprov.index')->with('success', 'Data berhasil disimpan.');
    }

    public function show(Wbtbprov $wbtbprov)
    {
        return view('admin.wbtbprov.show', compact('wbtbprov'));
    }

    public function edit($id)
    {
        $wbtbprov = Wbtbprov::findOrFail($id);
        return view('admin.wbtbprov.edit', compact('wbtbprov'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'lokasi' => 'required',
            'galeri.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $wbtbprov = Wbtbprov::findOrFail($id);
        $wbtbprov->nama = $request->nama;
        $wbtbprov->deskripsi = $request->deskripsi;
        $wbtbprov->lokasi = $request->lokasi;
        $wbtbprov->save();

        if ($request->hasFile('galeri')) {
            foreach ($request->file('galeri') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->storeAs('public/galeri', $imageName);

                $wbtbprov->galleries()->create(['file_path' => $imageName]);
            }
        }

        return redirect()->route('wbtbprov.index')->with('success', 'Data berhasil diupdate.');
    }

    public function destroy(Wbtbprov $wbtbprov)
    {
        foreach ($wbtbprov->galleries as $galeri) {
            Storage::delete('public/galeri/' . basename($galeri->file_path));
        }

        $wbtbprov->delete();

        return redirect()->route('wbtbprov.index')->with('success', 'Adat deleted successfully.');
    }

    public function showDetails($id)
    {
        $wbtbprov = Wbtbprov::findOrFail($id);
        return view('masyarakat.wbtbprov.detail', compact('wbtbprov'));
    }
}