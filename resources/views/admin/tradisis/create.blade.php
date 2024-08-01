@extends('layouts.master')

@section('content')
 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Data Tradisi</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('tradisis.store') }}" enctype="multipart/form-data">
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
                            <input type="file" name="galeri[]" class="form-control-file" id="galeri" multiple>
                        </div>

                        <!-- Opsi Kategori -->
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <select name="kategori" id="kategori" class="form-control" required>
                                <option value="">Pilih Kategori</option>
                                <option value="1">Nasional</option>
                                <option value="2">Provinsi</option>
                            </select>
                        </div>
                    
                        <div id="national-category-group" class="form-group d-none">
                            <label for="national_category_id">Kategori Nasional</label>
                            <select name="national_category_id" id="national_category_id" class="form-control">
                                @foreach($nationalCategories as $category)
                                    <option value="{{ $category->id }}">{{ $category->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    
                        <div id="provinsi-category-group" class="form-group d-none">
                            <label for="provinsi_category_id">Kategori Provinsi</label>
                            <select name="provinsi_category_id" id="provinsi_category_id" class="form-control">
                                @foreach($provinsiCategories as $category)
                                    <option value="{{ $category->id }}">{{ $category->nama }}</option>
                                @endforeach
                            </select>
                        </div>

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
