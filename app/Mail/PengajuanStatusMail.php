<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StatusPengajuanUpdate extends Mailable
{
    use Queueable, SerializesModels;

    public $pengajuan;

    public function __construct($pengajuan)
    {
        $this->pengajuan = $pengajuan;
    }

    public function build()
    {
        return $this->view('emails.status_pengajuan_update')
                    ->with([
                        'nama_objek_budaya' => $this->pengajuan->nama_objek_budaya,
                        'status' => $this->pengajuan->status == 1 ? 'Diajukan' : ($this->pengajuan->status == 2 ? 'Dicek' : ($this->pengajuan->status == 3 ? 'Diterima' : 'Ditolak')),
                    ]);
    }
}
