@extends('masyarakat.partials.master')

@section('title', 'Detail Ritus')

@section('content')
    <div class="container mt-5">
        <h2>{{ $ritus->nama }}</h2>
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
                    <p class="justifikasi-teks">{!! nl2br(e($ritus->deskripsi)) !!}</p>
                  </div>
                  <div class="tab-pane fade" id="lokasi" role="tabpanel" aria-labelledby="lokasi-tab">
                    <p>{{ $ritus->lokasi }}</p>
                  </div>
                  <div class="tab-pane fade" id="galeri" role="tabpanel" aria-labelledby="galeri-tab">
                    <div class="row">
                        @foreach($ritus->galleries as $image)
                            <div class="col-lg-3 col-md-4 col-6">
                                <div class="d-block mb-4 h-100">
                                    <img class="img-fluid img-thumbnail" src="{{ Storage::url('galeri/'.$image->file_path) }}" alt="">
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
