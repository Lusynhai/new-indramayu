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
                        <h4>Adat Istiadat</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="item">
                        <h4>Cagar Budaya</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="#">
                        <div class="item">
                            <h4>Ritus</h4>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="#">
                        <div class="item">
                            <h4>Kesenian</h4>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div id="acc" class="card bg-none border mt-4">
        <div class="card-body">
            <h4 id="alphaA"><a href="/en/statesparties/af" class="text-dark">Adat Istiadat</a></h4>
            <div class="list_site">
                <ul>
                    @foreach ($adats as $adat)
                        <li class="cultural_danger">
                            <a href="{{ route('masyarakat.adat.detail', $adat->id) }}">{{ $adat->nama }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <h4 id="alphaA"><a href="/en/statesparties/af" class="text-dark">Cagar Budaya</a></h4>
            <div class="list_site">
                <ul>
                    @foreach ($cagarbudayas as $cagarbudaya)
                        <li class="cultural_danger">
                            <a href="{{ route('masyarakat.cagarbudaya.detail', $cagarbudaya->id) }}">{{ $cagarbudaya->nama }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <h4 id="alphaA"><a href="/en/statesparties/af" class="text-dark">Ritus</a></h4>
            <div class="list_site">
                <ul>
                    @foreach ($rituses as $ritus)
                        <li class="cultural_danger">
                            <a href="{{ route('masyarakat.ritus.detail', $ritus->id) }}">{{ $ritus->nama }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <h4 id="alphaA"><a href="/en/statesparties/af" class="text-dark">Kesenian</a></h4>
            <div class="list_site">
                <ul>
                    @foreach ($kesenians as $kesenian)
                        <li class="cultural_danger">
                            <a href="{{ route('masyarakat.kesenian.detail', $kesenian->id) }}">{{ $kesenian->nama }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
