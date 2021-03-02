@extends('layouts.frontend_layout')

@section('title')
  Blog | Login
@endsection

@section('stylesheet')
  <style>
    .title{
      font-size: 3rem;
      font-weight: 800;
      text-align: center!important;
    }
    .card {
      border-radius: 10px;
      box-shadow: 0 10px 10px rgba(0, 0, 0, 0.2), 0px 0px 25px rgba(0, 0, 0, 0.2);
    }
    .btn-rounded {
      border-radius: 6px !important;
    }
  </style>
@endsection

@section('content')
  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-6 offset-md-3">
          <div class="card">
            <div class="card-header">
              <h1 class="title">Login</h1>
            </div>
            <form action="{{ route('login') }}" method="post">
              @csrf
              <div class="card-body">
                <div class="row">
                  <div class="col-md-10 offset-md-1">
                    <div class="form-group">
                      <label for="">Email</label>
                      <input type="email" name="email" placeholder="EX. raihanafroz9@gmail.com" required
                             class="form-control">
                    </div>
                  </div>
                  <div class="col-md-10 offset-md-1">
                    <div class="form-group">
                      <label for="">Password</label>
                      <input type="password" name="password" placeholder="EX. ********" required class="form-control">
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer text-right">
                <a class="btn btn-sm btn-rounded btn-success" href="{{ route('register') }}">Register</a>
                <span type="submit" class="btn btn-sm btn-rounded btn-success">Login</span>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('script')
@endsection