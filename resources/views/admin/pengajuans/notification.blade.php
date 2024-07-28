@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Notifikasi Pengajuan</h1>
    <p>Anda memiliki {{ $jumlahNotifikasi }} pengajuan yang perlu diproses.</p>
    
    @if ($notifications->isEmpty())
        <p>Tidak ada notifikasi yang perlu diproses.</p>
    @else
        <ul>
            @foreach ($notifications as $notification)
                <li>
                    <strong>Pengajuan Baru:</strong> {{ $notification->data['nama'] }}
                    <div>
                        Deskripsi: {{ $notification->data['deskripsi'] }}
                    </div>
                    <div>
                        Status: {{ $notification->data['status'] }}
                    </div>
                    <div>
                        <a href="{{ route('admin.pengajuan.approve', $notification->data['pengajuan_id']) }}" class="btn btn-success">Setujui</a>
                        <a href="{{ route('admin.pengajuan.reject', $notification->data['pengajuan_id']) }}" class="btn btn-danger">Tolak</a>
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
