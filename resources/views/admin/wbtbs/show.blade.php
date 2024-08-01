@extends('layouts.master')

@section('content')
 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detail WBTB</div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <p>{{ $wbtb->nama }}</p>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <p>{!! nl2br(e($wbtb->deskripsi)) !!}</p>
                    </div>
                    <div class="form-group">
                        <label for="lokasi">Lokasi</label>
                        <p>{{ $wbtb->lokasi }}</p>
                    </div>
                    <div class="form-group">
                        <label for="galeri">Galeri</label>
                        <div class="row">
                            @foreach($wbtb->galleries as $galeri)
                            <div class="gallery-item">
                                <img src="{{ Storage::url('public/galeri/'.$galeri->file_path) }}" alt="{{ $galeri->kategori }}" class="img-thumbnail">
                                {{-- <form action="{{ route('galeri.destroy', $galeri->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form> --}}
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <a href="{{ route('wbtbs.index') }}" class="btn btn-primary mt-3">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
