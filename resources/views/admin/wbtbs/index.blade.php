@extends('layouts.master')

@section('css')
<link href="{{ asset('template/admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card border-0 shadow rounded">
        <div class="card-body">
            <a href="{{ route('wbtbs.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Data Baru</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Lokasi</th>
                            <th>Galeri</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        {{-- <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Lokasi</th>
                            <th>Galeri</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody> --}}
                        @foreach($wbtbs as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->nama }}</td>
                            <td>{!! nl2br(e($row->deskripsi)) !!}</td>
                            <td> <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($row->lokasi) }}" target="_blank">
                                {{ $row->lokasi }}
                            </a></td>
                            <td>{{ $row->galeri }}</td>
                            <td>
                                <a href="{{ route('wbtbs.show', $row->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('wbtbs.edit', $row->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('wbtbs.destroy', $row->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection