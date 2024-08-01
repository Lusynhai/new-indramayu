<?php
namespace App\Http\Controllers;

use App\Models\ObjekBudaya;
use App\Models\ObjekBudayaKategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WBTakBendaController extends Controller
{
    public function index()
    {
        $wbtbs = ObjekBudaya::all();
        return view('admin.wbtbs.index', compact('wbtbs'));
    }

    public function create()
    {
        $kategori = ObjekBudayaKategori::all();
        return view('admin.wbtbs.create', compact('kategori'));
    }

    public function store(Request $request)
{
    // Validasi
    $request->validate([
        'nama' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'lokasi' => 'required|string|max:255',
        'status' => 'required|string',
        'objek_budaya_kategori_id' => 'required|exists:objek_budaya_kategoris,id',
        'gambar.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Simpan data
    $wbtb = ObjekBudaya::create([
        'nama' => $request->nama,
        'deskripsi' => $request->deskripsi,
        'lokasi' => $request->lokasi,
        'status' => $request->status,
        'objek_budaya_kategori_id' => $request->objek_budaya_kategori_id,
    ]);

    // Simpan gambar
    if ($request->hasFile('gambar')) {
        foreach ($request->file('gambar') as $file) {
            $path = $file->store('gambar', 'public');
            $wbtb->galleries()->create(['file_path' => $path]);
        }
    }

    // Redirect dengan pesan sukses
    return redirect()->route('admin.wbtbs.index')->with('success', 'Data WBTB berhasil ditambahkan.');
}


    public function show(ObjekBudaya $wbtb)
    {
        return view('admin.wbtbs.show', compact('wbtb'));
    }

    public function edit($id)
    {
        $wbtb = ObjekBudaya::findOrFail($id);
        $kategori = ObjekBudayaKategori::all();
        return view('admin.wbtbs.edit', compact('wbtb', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'lokasi' => 'required',
            'status' => 'required',
            'objek_budaya_kategori_id' => 'required|exists:objek_budaya_kategoris,id',
            'gambar.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $wbtb = ObjekBudaya::findOrFail($id);
        $wbtb->nama = $request->nama;
        $wbtb->deskripsi = $request->deskripsi;
        $wbtb->lokasi = $request->lokasi;
        $wbtb->status = $request->status;
        $wbtb->objek_budaya_kategori_id = $request->objek_budaya_kategori_id;
        $wbtb->save();

        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $file) {
                $path = $file->store('gambar', 'public');
                $wbtb->galleries()->create(['file_path' => $path]);
            }
        }

        return redirect()->route('admin.wbtbs.index')->with('success', 'Data berhasil diupdate.');
    }

    public function destroy(ObjekBudaya $wbtb)
    {
        foreach ($wbtb->galleries as $galeri) {
            Storage::delete('public/galeri/' . basename($galeri->file_path));
        }

        $wbtb->delete();

        return redirect()->route('admin.wbtbs.index')->with('success', 'Data berhasil dihapus.');
    }

    public function showDetails($id)
    {
        $wbtb = ObjekBudaya::findOrFail($id);
        return view('masyarakat.wbtb.detail', compact('wbtb'));
    }
}
