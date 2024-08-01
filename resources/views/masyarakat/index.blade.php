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
                        <h4>Sejarah/Tradisi</h4>
                        <p class="data-count">{{ count($tradisis) }} Data</p> <!-- Keterangan jumlah data -->
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="item">
                        <h4>Cagar Budaya</h4>
                        <p class="data-count">{{ count($cagarbudayas) }} Data</p> <!-- Keterangan jumlah data -->
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="#">
                        <div class="item">
                            <h4>Kesenian</h4>
                            <p class="data-count">{{ count($kesenians) }} Data</p> <!-- Keterangan jumlah data -->
                        </div>
                    </a>
                </div>
                {{-- <div class="col-lg-3 col-md-6">
                    <a href="#">
                        <div class="item">
                            <h4>Pengajuan Objek Budaya</h4>
                            <p class="data-count">{{ count($pengajuans) }} Data</p> <!-- Keterangan jumlah data -->
                        </div>
                    </a>
                </div> --}}
            </div>
        </div>
    </div>
    
    <div class="container mt-4">
        <div id="acc" class="card bg-none border">
            <div class="card-body">
                <div class="category-section">
                    <h4 class="category-title">
                        <a href="/en/statesparties/af" class="text-dark">Sejarah/Tradisi</a>
                    </h4>
                    <ul>
                        @foreach ($tradisis as $tradisi)
                            <li class="cultural_item">
                                <span class="symbol tradisi"></span> <!-- Simbol bulat untuk adat istiadat -->
                                <a href="{{ route('masyarakat.tradisi.detail', $tradisi->id) }}">{{ $tradisi->nama }}</a>
                                <div class="item-details">
                                    {{-- <div class="category-section">
                                        <h5>Penetapan Tingkat Nasional</h5>
                                        <ul class="national-category">
                                            @foreach ($tradisi->nationalCategories as $nationalItem)
                                                <li>
                                                    <span class="symbol triangle nasional"></span> <!-- Simbol segitiga biru untuk nasional -->
                                                    <a href="{{ route('masyarakat.tradisi.national.detail', $nationalItem->id) }}">{{ $nationalItem->nama }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>  --}}
                                    {{-- <div class="category-section">
                                        <h5>Penetapan Tingkat Provinsi</h5>
                                        <ul class="provinsi-category">
                                            @foreach ($tradisi->provinsiCategories as $provinsiItem)
                                                <li>
                                                    <span class="symbol triangle provinsi"></span> <!-- Simbol segitiga hijau untuk provinsi -->
                                                    <a href="{{ route('masyarakat.tradisi.detail', $provinsiItem->id) }}">{{ $provinsiItem->nama }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div> --}}
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    
                </div>
                <div class="category-section">
                    <h4 class="category-title">
                        <a href="/en/statesparties/af" class="text-dark">Cagar Budaya</a>
                    </h4>
                    <div class="list_site">
                        <ul>
                            @foreach ($cagarbudayas as $cagarbudaya)
                                <li class="cultural_item">
                                    <span class="symbol cagar-budaya"></span> <!-- Simbol bulat untuk cagar budaya -->
                                    <a href="{{ route('masyarakat.cagarbudaya.detail', $cagarbudaya->id) }}">{{ $cagarbudaya->nama }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="category-section">
                    <h4 class="category-title">
                        <a href="/en/statesparties/af" class="text-dark">Kesenian</a>
                    </h4>
                    <div class="list_site">
                        <ul>
                            @foreach ($kesenians as $kesenian)
                                <li class="cultural_item">
                                    <span class="symbol kesenian"></span> <!-- Simbol bulat untuk kesenian -->
                                    <a href="{{ route('masyarakat.kesenian.detail', $kesenian->id) }}">{{ $kesenian->nama }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
@endsection
