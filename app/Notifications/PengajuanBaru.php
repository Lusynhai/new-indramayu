<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;

class PengajuanDiterima extends Notification implements ShouldQueue
{
    use Queueable;

    protected $pengajuan;

    public function __construct($pengajuan)
    {
        $this->pengajuan = $pengajuan;
    }

    public function via($notifiable)
    {
        return ['mail']; // Pilih metode notifikasi sesuai kebutuhan
    }

    public function toMail($notifiable)
    {
        return (new \Illuminate\Notifications\Messages\MailMessage)
                    ->line('Ada pengajuan baru dari masyarakat.')
                    ->action('Lihat Pengajuan', url('/admin/pengajuan'))
                    ->line('Terima kasih telah menggunakan aplikasi kami!');
    }
}
