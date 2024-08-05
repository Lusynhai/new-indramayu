
@extends('masyarakat.partials.master')

@section('content')
 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pengajuan Objek Budaya</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('masyarakat.pengajuan.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama Objek Budaya</label>
                            <input type="text" name="nama" class="form-control" id="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" id="deskripsi" rows="3" required></textarea>
                        </div>
                        {{-- <p>{!! nl2br(e($pengajuan->deskripsi)) !!}</p> --}}
                        <div class="form-group">
                            <label for="lokasi">Lokasi</label>
                            <input type="text" name="lokasi" class="form-control" id="lokasi" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email" required>
                        </div>
                        {{-- <div class="form-group">
                            <label for="galeri">Galeri</label>
                            <input type="file" name="galeri[]" class="form-control-file" id="galeri" multiple>
                        </div> --}}
                        <button type="submit" class="btn btn-primary mt-3">Ajukan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection