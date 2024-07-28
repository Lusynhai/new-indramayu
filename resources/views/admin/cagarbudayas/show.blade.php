@extends('layouts.master')

@section('content')
 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detail Cagar Budaya</div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <p>{{ $cagarbudaya->nama }}</p>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <p>{{ $cagarbudaya->deskripsi }}</p>
                    </div>
                    <div class="form-group">
                        <label for="lokasi">Lokasi</label>
                        <p>{{ $cagarbudaya->lokasi }}</p>
                    </div>
                    <div class="form-group">
                        <label for="galeri">Galeri</label>
                        <div class="row">
                            @foreach($cagarbudaya->galleries as $galeri)
                                <div class="col-md-4">
                                    <img src="{{ Storage::url('galeri/' . $galeri->file_path) }}" class="img-fluid" alt="Gambar Budaya">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <a href="{{ route('cagarbudayas.index') }}" class="btn btn-primary mt-3">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
