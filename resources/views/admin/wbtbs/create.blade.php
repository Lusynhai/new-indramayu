@extends('layouts.master')

@section('content')
 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Data WBTB</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('wbtbs.store') }}" enctype="multipart/form-data">
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
                            <label for="galeri">Galeri</label>
                            <input type="file" name="galeri" class="form-control-file" id="galeri" multiple>
                        </div>

                        <!-- Opsi Kategori -->
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <select name="status" id="kategori" class="form-control" required>
                                <option value="">Pilih Kategori</option>
                                <option value="Nasional">Nasional</option>
                                <option value="Provinsi">Provinsi</option>
                            </select>
                        </div>
                    
                        {{-- <div class="form-group">
                            <label for="national_category_id">Kategori Objek Budaya</label>
                            <select name="national_category_id" id="national_category_id" class="form-control">
                                @foreach($kategori as $category)    
                                    <option value="{{ $category->id }}">{{ $category->nama }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                    
                        {{-- <div id="provinsi-category-group" class="form-group d-none">
                            <label for="provinsi_category_id">Kategori Nasional/Provinsi</label>
                            <select name="provinsi_category_id" id="provinsi_category_id" class="form-control">
                                @foreach($provinsiCategories as $category)
                                    <option value="{{ $category->id }}">{{ $category->nama }}</option>
                                @endforeach
                            </select>
                        </div> --}}

                        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('kategori').addEventListener('change', function() {
        var value = this.value;
        document.getElementById('national-category-group').classList.toggle('d-none', value != 1);
        document.getElementById('provinsi-category-group').classList.toggle('d-none', value != 2);
    });
</script>
@endsection
