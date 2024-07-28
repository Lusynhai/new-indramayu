@extends('masyarakat.partials.master')

@section('title', 'Cagar Budaya')

@section('content')
    <div class="container mt-5">
        <h2>Cagar Budaya</h2>
        <div class="row">
            @foreach($cagarbudayas as $cagarbudaya)
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="d-block mb-4 h-100">
                        @if($cagarbudaya->galleries->isNotEmpty())
                            <img class="img-fluid img-thumbnail" src="{{ Storage::url('galeri/'.$cagarbudaya->galleries->first()->file_path) }}" alt="">
                        @else
                            <img class="img-fluid img-thumbnail" src="{{ asset('assets/images/no-image.png') }}" alt="">
                        @endif
                        <h5>{{ $cagarbudaya->nama }}</h5>
                        <a href="{{ route('masyarakat.cagarbudaya.detail', $cagarbudaya->id) }}" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
