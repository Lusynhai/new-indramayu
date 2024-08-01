@extends('masyarakat.partials.master')

@section('title', 'Sejarah/Tradisi')

@section('content')
    <div class="container mt-5">
        <h2>Sejarah/Tradisi</h2>
        <div class="row">
            @foreach($tradisis as $tradisi)
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="d-block mb-4 h-100">
                        @if($tradisi->galleries->isNotEmpty())
                            <img class="img-fluid img-thumbnail" src="{{ Storage::url('galeri/'.$tradisi->galleries->first()->file_path) }}" alt="">
                        @else
                            <img class="img-fluid img-thumbnail" src="{{ asset('assets/images/no-image.png') }}" alt="">
                        @endif
                        <h5>{{ $tradisi->nama }}</h5>
                        <a href="{{ route('masyarakat.adat.detail', $adat->id) }}" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
