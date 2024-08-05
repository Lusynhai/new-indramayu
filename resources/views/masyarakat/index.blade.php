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
                        <p class="data-count">{{ $wbtbnas->where('status', 'Nasional')->count() }} Data</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="item">
                        <h4>WBTB Ditetapkan Secara Provinsi</h4>
                        <p class="data-count">{{ $wbtbnas->where('status', 'Provinsi')->count() }} Data</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="item">
                        <h4>WBTB Ditetapkan Secara Kabupaten</h4>
                        <p class="data-count">{{ $wbtbkab->where('status', 'Provinsi')->count() }} Data</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="#">
                        <div class="item">
                            <h4>Pengajuan Objek Budaya</h4>
                            <p class="data-count">{{ $wbtbnas->where('status', 'Pengajuan')->count() }} Data</p>
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
                    <h4 class="category-title">Warisan Budaya Tak Benda</a>
                    </h4>
                </div>
            </div>
            <div class="card-body">
                <div class="category-section">
                    <h4 class="category-title">
                        <a href="#" class="text-dark">WBTB Kabupaten Indramayu - Nasional</a>
                    </h4>
                    @foreach($wbtbnas as $item)
                    <div class="card-body">
                        <div class="category-section">
                            <h4 class="category-title">
                                @if($item->kategori_id == 1)
                                    <span class="badge" style="background-color: red;">&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                    <a href="{{ route('masyarakat.wbtbnas.detail', ['id' => $item->id]) }}" class="text-dark">{{ $item->nama }}</a>
                                @elseif($item->kategori_id == 2)
                                    <span class="badge" style="background-color: blue;">&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                    <a href="{{ route('masyarakat.wbtbnas.detail', ['id' => $item->id]) }}" class="text-dark">{{ $item->nama }}</a>
                                @elseif($item->kategori_id == 3)
                                    <span class="badge" style="background: linear-gradient(to right, red, yellow, blue);">&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                    <a href="{{ route('masyarakat.wbtbnas.detail', ['id' => $item->id]) }}" class="text-dark">{{ $item->nama }}</a>
                                @endif
                            </h4>
                        </div> 
                    </div>
                @endforeach
                </div> 
            </div>
            
            <div class="card-body">
                <div class="category-section">
                    <h4 class="category-title">
                        <a href="#" class="text-dark">WBTB Kabupaten Indramayu - Provinsi</a>
                    </h4>
                    @foreach($wbtbprov as $item)
                    <div class="card-body">
                        <div class="category-section">
                            <h4 class="category-title">
                                @if($item->kategori_id == 1)
                                    <span class="badge" style="background-color: red;">&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                    <a href="{{ route('masyarakat.wbtbprov.detail', ['id' => $item->id]) }}}" class="text-dark">{{ $item->nama }}</a>
                                @elseif($item->kategori_id == 2)
                                    <span class="badge" style="background-color: blue;">&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                    <a href="{{ route('masyarakat.wbtbprov.detail', ['id' => $item->id]) }}}" class="text-dark">{{ $item->nama }}</a>
                                @elseif($item->kategori_id == 3)
                                    <span class="badge" style="background: linear-gradient(to right, red, yellow, blue);">&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                    <a href="{{ route('masyarakat.wbtbprov.detail', ['id' => $item->id]) }}}" class="text-dark">{{ $item->nama }}</a>
                                @endif
                            </h4>
                        </div> 
                    </div>
                @endforeach
                </div> 
            </div>

            <div class="card-body">
                <div class="category-section">
                    <h4 class="category-title">
                        <a href="#" class="text-dark">WBTB Kabupaten Indramayu - Kabupaten</a>
                    </h4>
                    @foreach($wbtbkab as $item)
                    <div class="card-body">
                        <div class="category-section">
                            <h4 class="category-title">
                                @if($item->kategori_id == 1)
                                    <span class="badge" style="background-color: red;">&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                    <a href="{{ route('masyarakat.wbtbkab.detail', ['id' => $item->id]) }}" class="text-dark">{{ $item->nama }}</a>
                                @elseif($item->kategori_id == 2)
                                    <span class="badge" style="background-color: blue;">&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                    <a href="{{ route('masyarakat.wbtbkab.detail', ['id' => $item->id]) }}" class="text-dark">{{ $item->nama }}</a>
                                @elseif($item->kategori_id == 3)
                                    <span class="badge" style="background: linear-gradient(to right, red, yellow, blue);">&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                    <a href="{{ route('masyarakat.wbtbkab.detail', ['id' => $item->id]) }}" class="text-dark">{{ $item->nama }}</a>
                                @endif
                            </h4>
                        </div> 
                    </div>
                @endforeach
                </div> 
            </div>

            <div class="card-body">
                <div class="category-section">
                    <h4 class="category-title">
                        <a href="#" class="text-dark">Pengajuan Objek Budaya</a>
                    </h4>
        </div>
    </div>
@endsection
