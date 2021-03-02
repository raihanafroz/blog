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
              <h2 class="panel-title">Tag Details</h2>
            </header>
            <div class="panel-body">
              <div class="row">
                <div class="col-lg-12 col-md-12 col-xl-12 text-right mb-3">
                  <a href="{{ route('admin.tag.index') }}" class="brn btn-success btn-sm">Tags</a>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="row">
                    <div class="col-md-3 col-xl-4 text-right"><h4>Name: </h4></div>
                    <div class="col-md-9 col-xl-8"><h4>{{ $tag->name }}</h4></div>
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