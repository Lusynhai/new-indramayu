@extends('masyarakat.partials.master')

@section('title', 'Adat Istiadat')

@section('content')
    <div class="container mt-5">
        <h2>Adat Istiadat</h2>
        <div class="row">
            @foreach($adats as $adat)
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="d-block mb-4 h-100">
                        @if($adat->galleries->isNotEmpty())
                            <img class="img-fluid img-thumbnail" src="{{ Storage::url('galeri/'.$adat->galleries->first()->file_path) }}" alt="">
                        @else
                            <img class="img-fluid img-thumbnail" src="{{ asset('assets/images/no-image.png') }}" alt="">
                        @endif
                        <h5>{{ $adat->nama }}</h5>
                        <a href="{{ route('masyarakat.adat.detail', $adat->id) }}" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
