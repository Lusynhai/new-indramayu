<?php
namespace App\Mail;

use App\Models\Pengajuan;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PengajuanStatusMail extends Mailable
{
    use Queueable, SerializesModels;

    public $pengajuan;
    public $statusMessage;

    public function __construct(Pengajuan $pengajuan, $statusMessage)
    {
        $this->pengajuan = $pengajuan;
        $this->statusMessage = $statusMessage;
    }

    public function build()
    {
        return $this->subject('Status Pengajuan Objek Budaya')
                    ->view('emails.pengajuan_status')
                    ->with([
                        'nama' => $this->pengajuan->nama,
                        'message' => $this->statusMessage,
                    ]);
    }
}
