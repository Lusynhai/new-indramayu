@extends('layouts.master')

@section('content')
 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Data Kesenian</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('kesenians.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" id="deskripsi" rows="3" required></textarea>
                        </div>
                        {{-- <div class="formatted-text">
                            {!! nl2br(e($kesenian->deskripsi)) !!}
                        </div> --}}
                        <div class="form-group">
                            <label for="galeri">Galeri</label>
                            <input type="file" name="galeri[]" class="form-control-file" id="galeri" multiple>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
