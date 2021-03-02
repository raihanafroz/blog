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
              <h2 class="panel-title">Edit Category</h2>
            </header>
            <div class="panel-body">
              <div class="row">
                <div class="col-lg-12 col-md-12 col-xl-12 text-right mb-3">
                  <a href="{{ route('admin.categories.store') }}" class="brn btn-success btn-sm">Categories</a>
                </div>
              </div>
              @if(session()->has('status'))
                {!! session()->get('status') !!}
              @endif

              <form action="{{ route('admin.categories.update', $category) }}" method="post">
                @csrf
                @method('put')
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="control-label">Name<span class="text-danger">*</span></label>
                      <input type="text" name="name" placeholder="Name" required value="{{ $category->name }}"
                             class="form-control @error('name') is-invalid @enderror">
                      @error('name')
                      <strong class="text-danger">{{ $errors->first('name') }}</strong>
                      @enderror
                    </div>
                  </div>
                  <div class="col-sm-6 text-center">
                    <div class="form-group">
                      <label for="" class="col-form-label">Status</label>
                      <div class="">
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                          <label class="btn btn-primary @if(strtolower($category->status) == 'active')active @endif" style="cursor: pointer">
                            <input type="radio" name="status" value="active" @if(strtolower($category->status) == 'active') checked @endif> Active
                          </label>
                          <label class="btn btn-primary @if(strtolower($category->status) == 'inactive')active @endif" style="cursor: pointer">
                            <input type="radio" name="status" value="inactive"
                                   @if(strtolower($category->status) == 'inactive') checked @endif> Inactive
                          </label>
                        </div>
                        @error('status')
                        <strong class="text-danger">{{ $errors->first('status') }}</strong>
                        @enderror
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row mt-4">
                  <div class="col-sm-12 text-right">
                    <button class="btn btn-danger btn-sm" type="submit">Submit</button>
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