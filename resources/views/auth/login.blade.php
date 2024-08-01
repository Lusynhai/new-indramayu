@extends('layouts.master')

@section('content')
<main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
        <div class="card login-card">
            <div class="row no-gutters">
                <div class="col-md-5">
                    <img src="{{ asset('template/login/images/topeng.png') }}" alt="login" class="login-card-img">
                </div>
                <div class="col-md-7">
                    <div class="card-body">
                        <div class="brand-wrapper">
                            {{-- <img src="{{ asset('assets/images/logo.svg') }}" alt="logo" class="logo"> --}}
                        </div>
                        <p class="login-card-description">Login to your account</p>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email address" required>
                            </div>
                            <div class="form-group mb-4">
                                <label for="password" class="sr-only">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="***********" required>
                            </div>
                            <button class="btn btn-block login-btn mb-4" type="submit">Login</button>
                        </form>
                        {{-- <p class="login-card-footer-text">Don't have an account? <a href="{{ route('register') }}" class="text-reset">Register here</a></p> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
