@extends('layouts.master')

@section('content')
<main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="{{ asset('assets/images/login.jpg') }}" alt="login" class="login-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper">
                <img src="{{ asset('assets/images/logo.svg') }}" alt="logo" class="logo">
              </div>
              <p class="login-card-description">Reset your password</p>
              <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="form-group">
                  <label for="email" class="sr-only">Email</label>
                  <input type="email" name="email" id="email" class="form-control" placeholder="Email address" required>
                </div>
                <button class="btn btn-block login-btn mb-4" type="submit">Send Password Reset Link</button>
              </form>
              @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
              @endif
              <p class="login-card-footer-text">Remembered your password? <a href="{{ route('login') }}" class="text-reset">Login here</a></p>
              <nav class="login-card-footer-nav">
                <a href="#!">Terms of use.</a>
                <a href="#!">Privacy policy</a>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
</main>
@endsection
