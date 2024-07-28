@extends('masyarakat.partials.master')

@section('title', 'Ritus')

@section('content')
    <div class="container mt-5">
        <h2>Ritus</h2>
        <div class="row">
            @foreach($rituses as $ritus)
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="d-block mb-4 h-100">
                        @if($ritus->galleries->isNotEmpty())
                            <img class="img-fluid img-thumbnail" src="{{ Storage::url('galeri/'.$ritus->galleries->first()->file_path) }}" alt="">
                        @else
                            <img class="img-fluid img-thumbnail" src="{{ asset('assets/images/no-image.png') }}" alt="">
                        @endif
                        <h5>{{ $ritus->nama }}</h5>
                        <a href="{{ route('masyarakat.ritus.detail', $ritus->id) }}" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
