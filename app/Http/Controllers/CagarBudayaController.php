<?php

namespace App\Http\Controllers;

use App\Models\Adat;
use App\Models\CagarBudaya;
use App\Models\Galeri;
use App\Models\PengajuanObjekBudaya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CagarBudayaController extends Controller
{
    public function index()
    {
        $cagarbudayas = CagarBudaya::all();
        return view('admin.cagarbudayas.index', compact('cagarbudayas'));
    }

    public function create()
    {
        return view('admin.cagarbudayas.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'lokasi' => 'required|string|max:255',
        'galeri.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $cagarbudaya = new cagarBudaya();
    $cagarbudaya->nama = $request->nama;
    $cagarbudaya->deskripsi = $request->deskripsi;
    $cagarbudaya->lokasi = $request->lokasi;
    $cagarbudaya->save();

    if ($request->hasFile('galeri')) {
        foreach ($request->file('galeri') as $image) {
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/galeri', $imageName);

            $cagarbudaya->galleries()->create(['file_path' => $imageName]);
        }
    }

    return redirect()->route('cagarbudayas.index')->with('success', 'Data berhasil disimpan.');
}


    public function show(cagarBudaya $cagarbudaya)
    {
        return view('admin.cagarbudayas.show', compact('cagarbudaya'));
    }

    public function edit($id)
    {
        $cagarbudaya = cagarBudaya::findOrFail($id);
        return view('admin.cagarbudayas.edit', compact('cagarbudaya'));
    }

    public function update(Request $request,  $id)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'lokasi' => 'required',
            'galeri.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $cagarbudaya = cagarBudaya::findOrFail($id);
        $cagarbudaya->nama = $request->nama;
        $cagarbudaya->deskripsi = $request->deskripsi;
        $cagarbudaya->lokasi = $request->lokasi;
        $cagarbudaya->save();

        if ($request->hasFile('galeri')) {
            foreach ($request->file('galeri') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->storeAs('public/galeri', $imageName);

                $cagarbudaya->galleries()->create(['nama' => $imageName]);
            }
        }

        return redirect()->route('cagarbudayas.index')->with('success', 'Data berhasil diupdate.');
    }

    public function destroy(cagarBudaya $cagarbudaya)
    {
        // Hapus gambar terkait
        foreach ($cagarbudaya->galleries as $galeri) {
            Storage::delete('public/galeri/' . basename($galeri->file_path));
        }

        $cagarbudaya->delete();

        return redirect()->route('cagarbudayas.index')->with('success', 'Budaya deleted successfully.');
    }
    // public function showForPublic()
    // {
    //     $cagarbudayas = CagarBudaya::all();
    //     return view('masyarakat.cagarbudaya.index', compact('cagarbudayas'));
    // }

    public function showDetails($id)
    {
        $cagarbudaya = CagarBudaya::findOrFail($id);
        return view('masyarakat.cagarbudaya.detail', compact('cagarbudaya'));
    }
}
