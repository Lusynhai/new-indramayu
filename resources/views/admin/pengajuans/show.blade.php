@extends('layouts.master')

@section('css')
    <link href="{{ asset('template/admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card border-0 shadow rounded">
            <div class="card-body">
                <h4>Detail Pengajuan Objek Budaya</h4>
                <table class="table">
                    <tr>
                        <th>Nama</th>
                        <td>{{ $pengajuan->nama }}</td>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <td>{{ $pengajuan->deskripsi }}</td>
                    </tr>
                    <tr>
                        <th>Lokasi</th>
                        <td>{{ $pengajuan->lokasi }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $pengajuan->email }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            <span class="
                                @if ($pengajuan->status == 0) bg-warning
                                @elseif ($pengajuan->status == 1) bg-secondary
                                @elseif ($pengajuan->status == 2) bg-success
                                @elseif ($pengajuan->status == 3) bg-danger
                                @else bg-light @endif
                                text-white p-2 rounded">
                                @if ($pengajuan->status == 0) Diajukan
                                @elseif ($pengajuan->status == 1) Dicek
                                @elseif ($pengajuan->status == 2) Diterima
                                @elseif ($pengajuan->status == 3) Ditolak
                                @else Tidak diketahui @endif
                            </span>
                        </td>
                    </tr>
                </table>

                <form action="{{ route('admin.pengajuans.updateStatus', $pengajuan->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="status">Ubah Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="1">Dicek</option>
                            <option value="2">Diterima</option>
                            <option value="3">Ditolak</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Status</button>
                </form>
            </div>
        </div>
    </div>
@endsection
