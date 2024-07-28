@extends('masyarakat.partials.master')

@section('title', 'Detail Adat Istiadat')

@section('css')
<style>
    .justifikasi-teks {
        text-align: justify;
        text-justify: inter-word;
        margin: 20px 5%;
    }
</style>
@endsection

@section('content')
    <div class="container mt-5">
        <h2>{{ $adat->nama }}</h2>
    </div>
    <div class="more-info">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tabs-content">
                        <div class="row">
                            <div class="nav-wrapper">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="true">Description</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="lokasi-tab" data-bs-toggle="tab" data-bs-target="#lokasi" type="button" role="tab" aria-controls="lokasi" aria-selected="false">Lokasi</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="galeri-tab" data-bs-toggle="tab" data-bs-target="#galeri" type="button" role="tab" aria-controls="galeri" aria-selected="false">Galeri</button>
                                    </li>
                                </ul>
                            </div>              
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                                    <p class="justifikasi-teks">{!! nl2br(e($adat->deskripsi)) !!}</p>
                                </div>
                                <div class="tab-pane fade" id="lokasi" role="tabpanel" aria-labelledby="lokasi-tab">
                                    <p>{{ $adat->lokasi }}</p>
                                </div>
                                <div class="tab-pane fade" id="galeri" role="tabpanel" aria-labelledby="galeri-tab">
                                    <div class="row">
                                        @foreach($adat->galleries as $image)
                                            <div class="col-lg-3 col-md-4 col-6">
                                                <div class="d-block mb-4 h-100">
                                                    <a href="{{ route('galeri.show', $image->id) }}">
                                                        <img class="img-fluid img-thumbnail" src="{{ Storage::url('galeri/' . $image->file_path) }}" alt="{{ $image->nama }}">
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Hilangkan logika modal yang tidak diperlukan
    });
</script>
@endsection
