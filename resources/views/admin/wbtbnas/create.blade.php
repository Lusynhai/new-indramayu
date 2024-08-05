@extends('layouts.master')

@section('content')
 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Data WBTB Kabupaten Indramayu - Nasional</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('wbtbnas.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" id="deskripsi" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="lokasi">Lokasi</label>
                            <input type="text" name="lokasi" class="form-control" id="lokasi" required>
                        </div>
                        <div class="form-group">
                            <label for="document">Document</label>
                            <textarea name="document" class="form-control" id="deskripsi" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="galeri">Galeri</label>
                            <input type="file" name="galeri" class="form-control-file" id="galeri" multiple>
                        </div>
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <select name="kategori_id" id="kategori" class="form-control" required>
                                <option value="">Pilih Kategori</option>
                                <option value="1">Sejarah/Tradisi</option>
                                <option value="2">Cagar Budaya</option>
                                <option value="3">Kesenian</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
