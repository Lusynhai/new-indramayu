@extends('masyarakat.partials.master')

@section('title', 'Kesenian')

@section('content')
    <div class="container mt-5">
        <h2>Kesenian</h2>
        <div class="row">
            @foreach($kesenians as $kesenian)
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="d-block mb-4 h-100">
                        @if($kesenian->galleries->isNotEmpty())
                            <img class="img-fluid img-thumbnail" src="{{ Storage::url('galeri/'.$kesenian->galleries->first()->file_path) }}" alt="">
                        @else
                            <img class="img-fluid img-thumbnail" src="{{ asset('assets/images/no-image.png') }}" alt="">
                        @endif
                        <h5>{{ $kesenian->nama }}</h5>
                        <a href="{{ route('masyarakat.kesenian.detail', $kesenian->id) }}" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
