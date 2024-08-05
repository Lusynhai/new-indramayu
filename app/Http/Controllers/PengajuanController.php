<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\PengajuanStatusMail;

class PengajuanController extends Controller
{
    public function indexMasyarakat()
    {
        $objek = Pengajuan::all();
        return view('masyarakat.pengajuan.index', compact('objek'));
    }

    public function createMasyarakat()
    {
        return view('masyarakat.pengajuan.create');
    }

    public function storeMasyarakat(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'lokasi' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        // Simpan pengajuan
        $pengajuan = Pengajuan::create([
            // 'user_id' => auth()->id(),
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'lokasi' => $request->lokasi,
            'email' => $request->email,
            'status' => 0, // Diajukan
        ]);

        // Kirim email (jika diperlukan)
        // Mail::to($request->email)->send(new PengajuanStatusMail($pengajuan, 'Pengajuan Anda telah diajukan.'));

        // Redirect ke halaman pengajuan dengan pesan sukses
        return redirect()->route('masyarakat.pengajuan.index')->with('success', 'Pengajuan berhasil diajukan.');
    }

    public function indexAdmin()
    {
        $objek = Pengajuan::all();
        return view('admin.pengajuans.index', compact('objek'));
    }

    public function updateStatus(Request $request, $id)
{
    // Validasi status
    $request->validate([
        'status' => 'required|integer|between:0,3'
    ]);

    // Temukan pengajuan berdasarkan ID
    $pengajuan = Pengajuan::findOrFail($id);

    // Update status pengajuan
    $pengajuan->status = $request->status;
    $pengajuan->save();

    // Tentukan pesan status
    $statusMessage = '';
    switch ($request->status) {
        case 1:
            $statusMessage = 'Pengajuan Anda sedang dicek.';
            break;
        case 2:
            $statusMessage = 'Pengajuan Anda telah diterima.';
            // $this->simpanPengajuan($pengajuan); // Hapus baris ini jika tidak diperlukan
            break;
        case 3:
            $statusMessage = 'Pengajuan Anda telah ditolak.';
            break;
    }

        // Kirim email (jika diperlukan)
        // Mail::to($pengajuan->email)->send(new PengajuanStatusMail($pengajuan, $statusMessage));

        // Redirect ke halaman admin dengan pesan sukses
        return redirect()->route('admin.pengajuans.index')->with('success', 'Status pengajuan berhasil diubah.');
    }
    public function showAdmin($id)
{
    $pengajuan = Pengajuan::findOrFail($id);
    return view('admin.pengajuans.show', compact('pengajuan'));
}

}

