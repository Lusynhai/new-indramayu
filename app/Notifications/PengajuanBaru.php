<?php
namespace App\Notifications;

use App\Models\Pengajuan;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PengajuanBaru extends Notification
{
    use Queueable;

    protected $pengajuan;

    public function __construct(PengajuanBaru $pengajuan)
    {
        $this->pengajuan = $pengajuan;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Pengajuan Objek Budaya Baru')
                    ->line('Ada pengajuan objek budaya baru.')
                    ->action('Lihat Pengajuan', url('/admin/pengajuan/' . $this->pengajuan->id))
                    ->line('Terima kasih telah menggunakan aplikasi kami!');
    }
}
