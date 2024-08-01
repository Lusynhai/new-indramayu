@extends('masyarakat.partials.master')

@section('title', 'Disbud Indramayu')

@section('content')
    <div class="main-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="caption header-text">
                        <h6>Selamat Datang di</h6>
                        <h2>DINAS KEBUDAYAAN KABUPATEN INDRAMAYU</h2>
                        <div class="search-input">
                            <form id="search" action="#">
                                <input type="text" placeholder="Ketik Sesuatu" id='searchText' name="searchKeyword" onkeypress="handle"/>
                                <button role="button">Cari Sekarang</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="item">
                        <h4>WBTB Ditetapkan Secara Nasional</h4>
                        <p class="data-count">{{ $wbtbs->where('status', 'Nasional')->count() }} Data</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="item">
                        <h4>WBTB Ditetapkan Secara Provinsi</h4>
                        <p class="data-count">{{ $wbtbs->where('status', 'Provinsi')->count() }} Data</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="#">
                        <div class="item">
                            <h4>Pengajuan Objek Budaya</h4>
                            <p class="data-count">{{ $wbtbs->where('status', 'Pengajuan')->count() }} Data</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <div id="acc" class="card bg-none border">
            <div class="card-body">
                <div class="category-section">
                    <h4 class="category-title">
                        <a href="#" class="text-dark">Warisan Budaya Tak Benda</a>
                    </h4>
                    <ul>
                        @foreach ($wbtbs as $wbtb)
                            <li class="cultural_item">
                                @if($wbtb->status == "Nasional")
                                <div class="item-details">
                                    <div class="category-section">
                                        <h5>Penetapan Tingkat Nasional</h5>
                                        <ul class="national-category">
                                            <li>
                                                <span class="symbol triangle nasional"></span>
                                                <a href="{{ route('masyarakat.wbtb.detail', $wbtb->id) }}">{{ $wbtb->nama }}</a>
                                            </li>
                                        </ul>
                                    </div> 
                                    @elseif($wbtb->status == "Provinsi")
                                    <div class="category-section">
                                        <h5>Penetapan Tingkat Provinsi</h5>
                                        <ul class="provinsi-category">
                                            <li>
                                                <span class="symbol triangle provinsi"></span>
                                                <a href="{{ route('masyarakat.wbtb.detail', $wbtb->id) }}">{{ $wbtb->nama }}</a>
                                            </li>
                                        </ul>
                                    </div> 
                                    @endif
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div> 
            </div>
        </div>
    </div>
@endsection
