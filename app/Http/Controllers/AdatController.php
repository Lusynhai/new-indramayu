<?php
namespace App\Http\Controllers;

use App\Models\Adat;
use App\Models\Galeri;
use App\Models\PengajuanObjekBudaya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdatController extends Controller
{
    public function index()
    {
        $adats = Adat::all();
        return view('admin.adats.index', compact('adats'));
    }

    public function create()
    {
        return view('admin.adats.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'lokasi' => 'required|string|max:255',
            'galeri.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $adat = new Adat();
        $adat->nama = $request->nama;
        $adat->deskripsi = $request->deskripsi;
        $adat->lokasi = $request->lokasi;
        $adat->save();

        if ($request->hasFile('galeri')) {
            foreach ($request->file('galeri') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->storeAs('public/galeri', $imageName);

                $adat->galleries()->create(['file_path' => $imageName]);
            }
        }

        return redirect()->route('adats.index')->with('success', 'Data berhasil disimpan.');
    }

    public function show(Adat $adat)
    {
        return view('admin.adats.show', compact('adat'));
    }

    public function edit($id)
    {
        $adat = Adat::findOrFail($id);
        return view('admin.adats.edit', compact('adat'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'lokasi' => 'required',
            'galeri.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $adat = Adat::findOrFail($id);
        $adat->nama = $request->nama;
        $adat->deskripsi = $request->deskripsi;
        $adat->lokasi = $request->lokasi;
        $adat->save();

        if ($request->hasFile('galeri')) {
            foreach ($request->file('galeri') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->storeAs('public/galeri', $imageName);

                $adat->galleries()->create(['file_path' => $imageName]);
            }
        }

        return redirect()->route('adats.index')->with('success', 'Data berhasil diupdate.');
    }

    public function destroy(Adat $adat)
    {
        foreach ($adat->galleries as $galeri) {
            Storage::delete('public/galeri/' . basename($galeri->file_path));
        }

        $adat->delete();

        return redirect()->route('adats.index')->with('success', 'Adat deleted successfully.');
    }

    public function showDetails($id)
    {
        $adat = Adat::findOrFail($id);
        return view('masyarakat.adat.detail', compact('adat'));
    }
}
