@extends('layouts.master')

@section('content')
<div class="content-body">
    <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
        <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-30">
            <div>
                <h4 class="mg-b-0 tx-spacing--1">Welcome to Dashboard</h4>
            </div>
        </div>

        <div class="row row-xs">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.490418346631!2d108.31649397480416!3d-6.3304461936591485!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6eb95999b0f9ed%3A0x747c7bbce7aafebf!2sDinas%20Pendidikan%20dan%20Kebudayaan%20Kabupaten%20Indramayu!5e0!3m2!1sid!2sid!4v1717742002123!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div><!-- card-body -->
                    
                    <div class="card-footer pd-y-15 pd-x-20">
                        <div class="row row-sm">
                            <div class="col-6 col-sm-4 col-md-3 col-lg">
                                {{-- <h4 class="tx-normal tx-rubik mg-b-10">{{ $jumlahAdat }}</h4> --}}
                                <div class="progress ht-2 mg-b-10">
                                    <!-- Progress bar for Adat -->
                                </div>
                                <h6 class="tx-uppercase tx-spacing-1 tx-semibold tx-10 tx-color-02 mg-b-2">Adat Istiadat</h6>
                                <p class="tx-10 tx-color-03 mg-b-0"><!-- Percentage or change --></p>
                            </div><!-- col -->
                            <div class="col-6 col-sm-4 col-md-3 col-lg">
                                {{-- <h4 class="tx-normal tx-rubik mg-b-10">{{ $jumlahCagarBudaya }}</h4> --}}
                                <div class="progress ht-2 mg-b-10">
                                    <!-- Progress bar for Cagar Budaya -->
                                </div>
                                <h6 class="tx-uppercase tx-spacing-1 tx-semibold tx-10 tx-color-02 mg-b-2">Cagar Budaya</h6>
                                <p class="tx-10 tx-color-03 mg-b-0"><!-- Percentage or change --></p>
                            </div><!-- col -->
                            <div class="col-6 col-sm-4 col-md-3 col-lg">
                                {{-- <h4 class="tx-normal tx-rubik mg-b-10">{{ $jumlahRitus }}</h4> --}}
                                <div class="progress ht-2 mg-b-10">
                                    <!-- Progress bar for Ritus -->
                                </div>
                                <h6 class="tx-uppercase tx-spacing-1 tx-semibold tx-10 tx-color-02 mg-b-2">Ritus</h6>
                                <p class="tx-10 tx-color-03 mg-b-0"><!-- Percentage or change --></p>
                            </div><!-- col -->
                            <div class="col-6 col-sm-4 col-md-3 col-lg mg-t-20 mg-sm-t-0">
                                {{-- <h4 class="tx-normal tx-rubik mg-b-10">{{ $jumlahKesenian }}</h4> --}}
                                <div class="progress ht-2 mg-b-10">
                                    <!-- Progress bar for Kesenian -->
                                </div>
                                <h6 class="tx-uppercase tx-spacing-1 tx-semibold tx-10 tx-color-02 mg-b-2">Kesenian</h6>
                                <p class="tx-10 tx-color-03 mg-b-0"><!-- Percentage or change --></p>
                            </div><!-- col -->
                            {{-- Additional column for other data --}}
                        </div><!-- row -->
                    </div><!-- card-footer -->
                </div><!-- card -->
            </div><!-- col -->
        </div><!-- row -->
    </div><!-- container -->
</div><!-- content-body -->
@endsection
