<?php
namespace App\Http\Controllers;

use App\Models\Tradisi;
use App\Models\Galeri;
use App\Models\NationalCategory;
use App\Models\PengajuanObjekBudaya;
use App\Models\ProvinsiCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TradisiController extends Controller
{
    public function index()
    {
        $tradisis = Tradisi::all();
        return view('admin.tradisis.index', compact('tradisis'));
    }

    public function create()
    {
        return view('admin.tradisis.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'lokasi' => 'required|string|max:255',
            'galeri.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kategori' => 'required|in:1,2',
            'national_category_id' => 'required_if:kategori,1|exists:national_categories,id',
            'provinsi_category_id' => 'required_if:kategori,2|exists:provinsi_categories,id'
        ]);

        // Simpan data tradisi
        $tradisi = Tradisi::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'lokasi' => $request->lokasi,
        ]);

        // Simpan file galeri
        if ($request->hasFile('galeri')) {
            foreach ($request->file('galeri') as $file) {
                $path = $file->store('galeri', 'public');
                $tradisi->galleries()->create(['file_path' => $path]);
            }
        }

        // Proses berdasarkan kategori
        if ($request->kategori == 1) {
            // Kategori Nasional
            $nationalCategory = NationalCategory::find($request->input('national_category_id'));
            if ($nationalCategory) {
                $tradisi->nationalCategories()->attach($nationalCategory->id);
            }
        } elseif ($request->kategori == 2) {
            // Kategori Provinsi
            $provinsiCategory = ProvinsiCategory::find($request->input('provinsi_category_id'));
            if ($provinsiCategory) {
                $tradisi->provinsiCategories()->attach($provinsiCategory->id);
            }
        }

        return redirect()->route('tradisis.index')->with('success', 'Data tradisi berhasil ditambahkan.');
    }

    public function show(Tradisi $tradisi)
    {
        return view('admin.tradisis.show', compact('tradisi'));
    }

    public function edit($id)
    {
        $tradisi = Tradisi::findOrFail($id);
        return view('admin.tradisis.edit', compact('tradisi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'lokasi' => 'required',
            'galeri.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $tradisi = Tradisi::findOrFail($id);
        $tradisi->nama = $request->nama;
        $tradisi->deskripsi = $request->deskripsi;
        $tradisi->lokasi = $request->lokasi;
        $tradisi->save();

        if ($request->hasFile('galeri')) {
            foreach ($request->file('galeri') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->storeAs('public/galeri', $imageName);

                $tradisi->galleries()->create(['file_path' => $imageName]);
            }
        }

        return redirect()->route('tradisis.index')->with('success', 'Data berhasil diupdate.');
    }

    public function destroy(Tradisi $tradisi)
    {
        foreach ($tradisi->galleries as $galeri) {
            Storage::delete('public/galeri/' . basename($galeri->file_path));
        }

        $tradisi->delete();

        return redirect()->route('tradisis.index')->with('success', 'Tradisi deleted successfully.');
    }

    public function showDetails($id)
    {
        $tradisi = tradisi::findOrFail($id);
        return view('masyarakat.tradisi.detail', compact('tradisi'));
    }
}
