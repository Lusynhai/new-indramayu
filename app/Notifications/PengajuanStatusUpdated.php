<?php

namespace App\Notifications;

use App\Models\Pengajuan;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PengajuanStatusUpdated extends Notification
{
    use Queueable;

    protected $pengajuan;
    protected $statusMessage;

    public function __construct(Pengajuan $pengajuan, $statusMessage)
    {
        $this->pengajuan = $pengajuan;
        $this->statusMessage = $statusMessage;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Status Pengajuan Objek Budaya')
            ->line('Status pengajuan Anda telah diperbarui.')
            ->line('Nama: ' . $this->pengajuan->nama)
            ->line('Status: ' . $this->statusMessage)
            ->line('Terima kasih telah menggunakan aplikasi kami!');
    }
}
