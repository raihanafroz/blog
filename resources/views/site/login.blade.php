@extends('layouts.frontend_layout')

@section('title')
R - Blog
@endsection

@section('stylesheet')

@endsection

@section('content')
<!-- Hero Section-->
<section class="hero">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-lg-6 col-xl-6 offset-md-3 offset-lg-3 offset-xl-3">
        <div class="row">
          <div class="col-12 text-center">
            <span class="title">Login</span>
          </div>
        </div>
        <form method="POST" action="{{ route('login') }}">
          @csrf
          <div class="form-group">
            <label for="email" class="col-form-label text-md-right">E-Mail Address</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
              @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
          </div>

          <div class="form-group">
            <label for="password" class="col-form-label text-md-right">Password</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>

          <div class="form-group text-right m-0">
            <a class="btn btn-link" href="{{ route('forgot.password') }}">
              Forgot Your Password?
            </a>
          </div>
          <div class="form-group mb-0">
            <button type="submit" class="btn btn-outline-success">Login</button>
            <a href="{{ route('register') }}" class="btn btn-outline-info">Register</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

@endsection

@section('script')
@endsection
