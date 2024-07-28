<?php

namespace App\Http\Controllers;

use App\Models\Ritus;
use App\Models\Galeri;
use App\Models\PengajuanObjekBudaya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RitusController extends Controller
{
    public function index()
    {
        $objek = PengajuanObjekBudaya::all();
        return view('admin.rituses.index', compact('objek'));
    }

    public function create()
    {
        return view('admin.rituses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'lokasi' => 'required|string|max:255',
            'galeri.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $ritus = new Ritus();
        $ritus->nama = $request->nama;
        $ritus->deskripsi = $request->deskripsi;
        $ritus->lokasi = $request->lokasi;
        $ritus->save();

        if ($request->hasFile('galeri')) {
            foreach ($request->file('galeri') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->storeAs('public/galeri', $imageName);

                $ritus->galleries()->create(['file_path' => $imageName]);
            }
        }

        return redirect()->route('rituses.index')->with('success', 'Data berhasil disimpan.');
    }

    public function show(Ritus $ritus)
    {
        return view('admin.rituses.show', compact('ritus'));
    }

    public function edit($id)
    {
        $ritus = Ritus::findOrFail($id);
        return view('admin.rituses.edit', compact('ritus'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'lokasi' => 'required',
            'galeri.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $ritus = Ritus::findOrFail($id);
        $ritus->nama = $request->nama;
        $ritus->deskripsi = $request->deskripsi;
        $ritus->lokasi = $request->lokasi;
        $ritus->save();

        if ($request->hasFile('galeri')) {
            foreach ($request->file('galeri') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->storeAs('public/galeri', $imageName);

                $ritus->galleries()->create(['file_path' => $imageName]);
            }
        }

        return redirect()->route('rituses.index')->with('success', 'Data berhasil diupdate.');
    }

    public function destroy(Ritus $ritus)
    {
        foreach ($ritus->galleries as $galeri) {
            Storage::delete('public/galeri/' . basename($galeri->file_path));
        }

        $ritus->delete();

        return redirect()->route('rituses.index')->with('success', 'Ritus deleted successfully.');
    }

    public function showForPublic()
    {
        $rituses = Ritus::all();
        return view('masyarakat.ritus.index', compact('rituses'));
    }

    public function showDetails($id)
    {
        $ritus = Ritus::findOrFail($id);
        return view('masyarakat.ritus.detail', compact('ritus'));
    }
}
