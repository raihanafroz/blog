@extends('layouts.admin_layout')

@section('stylesheet')
@endsection


@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <section class="panel">
            <header class="panel-heading">
              <h2 class="panel-title">Post Details</h2>
            </header>
            <div class="panel-body">
              <div class="row">
                <div class="col-lg-12 col-md-12 col-xl-12 text-right mb-3">
                  <a href="{{ route('admin.post.index') }}" class="brn btn-success btn-sm">Posts</a>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="row">
                    <div class="col-md-3 col-xl-4 text-right"><h4>Name: </h4></div>
                    <div class="col-md-9 col-xl-8"><h4>{{ $post->title }}</h4></div>
                  </div>
                  <div class="row">
                    <div class="col-md-3 col-xl-4 text-right"><h4>Status: </h4></div>
                    <div class="col-md-9 col-xl-8 text-capitalize"><h4>{{ $post->status }}</h4></div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </div>
@endsection


@section('script')

@endsection