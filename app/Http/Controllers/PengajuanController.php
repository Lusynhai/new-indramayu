<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\Adat;
use App\Models\CagarBudaya;
use App\Models\Ritus;
use App\Models\Kesenian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\PengajuanStatusMail;

class PengajuanController extends Controller
{
    public function indexMasyarakat()
    {
        $objek = Pengajuan::where('user_id', auth()->id())->get();
        return view('masyarakat.pengajuan.index', compact('objek'));
    }

    public function createMasyarakat()
    {
        return view('masyarakat.pengajuan.create');
    }

    public function storeMasyarakat(Request $request)
    {
        $request->validate([
            'options' => 'required|array',
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'lokasi' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $pengajuan = Pengajuan::create([
            'user_id' => auth()->id(),
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'lokasi' => $request->lokasi,
            'email' => $request->email,
            'status' => 0, // Diajukan
            'options' => json_encode($request->options),
        ]);

        Mail::to($request->email)->send(new PengajuanStatusMail($pengajuan, 'Pengajuan Anda telah diajukan.'));

        return redirect()->route('masyarakat.pengajuan.index')->with('success', 'Pengajuan berhasil diajukan.');
    }

    public function indexAdmin()
    {
        $objek = Pengajuan::all();
        return view('admin.pengajuan.index', compact('objek'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|integer|between:0,3'
        ]);

        $pengajuan = Pengajuan::findOrFail($id);

        $pengajuan->status = $request->status;
        $pengajuan->save();

        $statusMessage = '';
        switch ($request->status) {
            case 1:
                $statusMessage = 'Pengajuan Anda sedang dicek.';
                break;
            case 2:
                $statusMessage = 'Pengajuan Anda telah diterima.';
                $this->simpanPengajuan($pengajuan);
                break;
            case 3:
                $statusMessage = 'Pengajuan Anda telah ditolak.';
                break;
        }

        Mail::to($pengajuan->email)->send(new PengajuanStatusMail($pengajuan, $statusMessage));

        return redirect()->route('admin.pengajuan.index')->with('success', 'Status pengajuan berhasil diubah.');
    }

    private function simpanPengajuan(Pengajuan $pengajuan)
    {
        $options = json_decode($pengajuan->options, true);

        if (in_array('option1', $options)) {
            Adat::create([
                'nama' => $pengajuan->nama,
                'deskripsi' => $pengajuan->deskripsi,
                'lokasi' => $pengajuan->lokasi,
            ]);
        }

        if (in_array('option2', $options)) {
            CagarBudaya::create([
                'nama' => $pengajuan->nama,
                'deskripsi' => $pengajuan->deskripsi,
                'lokasi' => $pengajuan->lokasi,
            ]);
        }

        if (in_array('option3', $options)) {
            Ritus::create([
                'nama' => $pengajuan->nama,
                'deskripsi' => $pengajuan->deskripsi,
                'lokasi' => $pengajuan->lokasi,
            ]);
        }

        if (in_array('option4', $options)) {
            Kesenian::create([
                'nama' => $pengajuan->nama,
                'deskripsi' => $pengajuan->deskripsi,
                'lokasi' => $pengajuan->lokasi,
            ]);
        }
    }
}
