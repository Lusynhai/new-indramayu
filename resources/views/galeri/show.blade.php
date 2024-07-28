@extends('masyarakat.partials.master')

@section('title', 'Detail Gambar')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <img src="{{ Storage::url('galeri/' . $image->file_path) }}" class="img-fluid" alt="{{ $image->nama }}">
        </div>
        <div class="col-md-4">
            <p>Dibuat pada: {{ $image->created_at }}</p>
            <p>Penulis: {{ $image->author }}</p>
            <p>Copyright: @disbudindramayu</p>
            <a href="{{ Storage::url('galeri/' . $image->file_path) }}" download class="btn btn-primary">Download Gambar</a>
        </div>
    </div>
</div>
@endsection
