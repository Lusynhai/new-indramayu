@extends('layouts.master')

@section('css')
    <link href="{{ asset('template/admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card border-0 shadow rounded">
            <div class="card-body">
                <h4>Data Pengajuan Objek Budaya</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($objek as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->nama }}</td>
                                    <td>{{ $row->deskripsi }}</td>
                                    <td>
                                        <span class="
                                            @if ($row->status == 0)
                                                bg-warning
                                            @elseif ($row->status == 1)
                                                bg-secondary
                                            @elseif ($row->status == 2)
                                                bg-success
                                            @elseif ($row->status == 3)
                                                bg-danger
                                            @else
                                                bg-light
                                            @endif
                                            text-white p-2 rounded
                                        ">
                                            @if ($row->status == 0)
                                                Diajukan
                                            @elseif ($row->status == 1)
                                                Dicek
                                            @elseif ($row->status == 2)
                                                Diterima
                                            @elseif ($row->status == 3)
                                                Ditolak
                                            @else
                                                Tidak diketahui
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.pengajuans.show', $row->id) }}" class="btn btn-info btn-sm">Detail</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
