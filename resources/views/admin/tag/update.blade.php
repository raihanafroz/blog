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
              <h2 class="panel-title">Edit Tag</h2>
            </header>
            <div class="panel-body">
              <div class="row">
                <div class="col-lg-12 col-md-12 col-xl-12 text-right mb-3">
                  <a href="{{ route('admin.tag.store') }}" class="brn btn-success btn-sm">Tags</a>
                </div>
              </div>
              @if(session()->has('status'))
                {!! session()->get('status') !!}
              @endif

              <form action="{{ route('admin.tag.update', $tag) }}" method="post">
                @csrf
                @method('put')
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="control-label">Name<span class="text-danger">*</span></label>
                      <input type="text" name="name" placeholder="Name" required value="{{ $tag->name }}"
                             class="form-control @error('name') is-invalid @enderror">
                      @error('name')
                      <strong class="text-danger">{{ $errors->first('name') }}</strong>
                      @enderror
                    </div>
                  </div>
                  <div class="col-sm-6" style="margin-top: 30px">
                    <button class="btn btn-danger btn-sm" type="submit">Save</button>
                  </div>
                </div>
              </form>
            </div>
          </section>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('script')
@endsection