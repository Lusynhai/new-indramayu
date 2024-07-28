<?php

namespace App\Http\Controllers;

use App\Models\Kesenian;
use App\Models\Galeri;
use App\Models\PengajuanObjekBudaya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KesenianController extends Controller
{
    public function index()
{
    $kesenians = Kesenian::all();
    return view('kesenians.index', compact('kesenians'));
}



    public function create()
    {
        return view('admin.kesenians.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'lokasi' => 'nullable|string',
        'deskripsi' => 'required|string',
        'galeri.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Simpan data kesenian
    $kesenian = new Kesenian();
    $kesenian->nama = $request->nama;
    $kesenian->lokasi = $request->lokasi;
    $kesenian->deskripsi = $request->deskripsi;
    $kesenian->save();

    // Simpan galeri
    if ($request->hasFile('galeri')) {
        foreach ($request->file('galeri') as $image) {
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/galeri', $imageName);

            $kesenian->galleries()->create(['file_path' => $imageName]);
        }
    }

    return redirect()->route('kesenians.index')->with('success', 'Data berhasil disimpan.');
}

public function update(Request $request, $id)
{
    $request->validate([
        'nama' => 'required',
        'lokasi' => 'nullable|string',
        'deskripsi' => 'required',
        'galeri.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $kesenian = Kesenian::findOrFail($id);
    $kesenian->nama = $request->nama;
    $kesenian->deskripsi = $request->deskripsi;
    $kesenian->lokasi = $request->lokasi;
    $kesenian->save();

    // Simpan galeri
    if ($request->hasFile('galeri')) {
        foreach ($request->file('galeri') as $image) {
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/galeri', $imageName);

            $kesenian->galleries()->create(['file_path' => $imageName]);
        }
    }

    return redirect()->route('kesenians.index')->with('success', 'Data berhasil diupdate.');
}



    public function show(Kesenian $kesenian)
    {
        return view('admin.kesenians.show', compact('kesenian'));
    }

    public function edit($id)
    {
        $kesenian = Kesenian::findOrFail($id);
        return view('admin.kesenians.edit', compact('kesenian'));
    }

    public function destroy(Kesenian $kesenian)
    {
        // Hapus gambar terkait
        foreach ($kesenian->galleries as $galeri) {
            Storage::delete('public/galeri/' . basename($galeri->file_path));
        }

        $kesenian->delete();

        return redirect()->route('kesenians.index')->with('success', 'Kesenian deleted successfully.');
    }
    public function showForPublic()
{
    $kesenians = Kesenian::all();
    return view('masyarakat.kesenian.index', compact('kesenians'));
}


    public function showDetails($id)
    {
        $kesenian = Kesenian::all();
        return view('masyarakat.kesenian.detail', compact('kesenian'));
    }
}
