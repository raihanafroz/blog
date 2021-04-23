@extends('layouts.admin_layout')

@section('stylesheet')
  <link href="{{ asset('assets/admin/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
  <link href="{{ asset('assets/admin/plugins/summernote/summernote-bs4.css') }}" rel="stylesheet" />
@endsection


@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <section class="panel">
            <header class="panel-heading">
              <h2 class="panel-title">Create New Post</h2>
            </header>
            <div class="panel-body">
              <div class="row">
                <div class="col-lg-12 col-md-12 col-xl-12 text-right mb-3">
                  <a href="{{ route('admin.post.index') }}" class="brn btn-success btn-sm">Posts</a>
                </div>
              </div>
              @if(session()->has('status'))
                {!! session()->get('status') !!}
              @endif
              <form action="{{ route('admin.post.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label class="control-label">Title<span class="text-danger">*</span></label>
                      <input type="text" name="title" placeholder="Post Title" required value="{{ old('title') }}"
                             class="form-control @error('title') is-invalid @enderror">
                      @error('title')
                      <strong class="text-danger">{{ $errors->first('title') }}</strong>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="control-label">Categories<span class="text-danger">*</span></label>
                      <select class="select2 form-control" data-placeholder="Choose a category" name="category" required
                              class="form-control @error('category') is-invalid @enderror">
                        <option value="">Choose a Category</option>
                        @foreach($categories as $category)
                          <option value="{{ $category->id }}" @if(old('category') == $category->id) selected @endif>{{ $category->name }}</option>
                        @endforeach
                      </select>
                      @error('category')
                      <strong class="text-danger">{{ $errors->first('category') }}</strong>
                      @enderror
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="control-label">Tags<span class="text-danger">*</span></label>
                      <select class="select2 form-control" multiple data-placeholder="Choose tags" name="tag[]" required
                              class="form-control @error('tag') is-invalid @enderror">
                        @foreach($tags as $tag)
                          <option value="{{ $tag->id }}" @if(collect(old('tag'))->contains($tag->id)) selected @endif>{{ $tag->name }}</option>
                        @endforeach
                      </select>
                      @error('tag')
                      <strong class="text-danger">{{ $errors->first('tag') }}</strong>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label class="control-label">Body<span class="text-danger">*</span></label>
                      <textarea name="body" class="summernote">{{ old('body') }}</textarea>
                      @error('body')
                      <strong class="text-danger">{{ $errors->first('body') }}</strong>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="control-label">Thumbnail<span class="text-danger">*</span></label>
                      <input type="file" name="thumbnail" placeholder="Choose a Image" required
                             class="form-control @error('thumbnail') is-invalid @enderror">
                      @error('thumbnail')
                      <strong class="text-danger">{{ $errors->first('thumbnail') }}</strong>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label">Image<span class="text-danger"></span></label>
                      <input type="file" name="image[]" multiple placeholder="Choose a Image"
                             class="form-control @error('image') is-invalid @enderror">
                      @error('image')
                      <strong class="text-danger">{{ $errors->first('image') }}</strong>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-2 text-center">
                    <div class="form-group">
                      <label for="" class="col-form-label">Status</label>
                      <div class="">
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                          <label
                            class="btn btn-primary @if(!old('status')) active @endif @if(strtolower(old('status')) == 'active')active @endif"
                            style="cursor: pointer">
                            <input type="radio" name="status" value="active"
                                   @if(!old('status')) checked @endif @if(strtolower(old('status')) == 'active') checked @endif> Active
                          </label>
                          <label class="btn btn-primary @if(strtolower(old('status')) == 'inactive')active @endif"
                                 style="cursor: pointer">
                            <input type="radio" name="status" value="inactive"
                                   @if(strtolower(old('status')) == 'inactive') checked @endif> Inactive
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
  <script src="{{ asset('assets/admin/plugins/select2/js/select2.min.js') }}"></script>
  <script src="{{ asset('assets/admin/plugins/summernote/summernote-bs4.js') }}"></script>
  <script>
    $(document).ready(function () {
      $(".select2").select2();
      $('.summernote').summernote({
        height: 150,                 // set editor height
        minHeight: null,             // set minimum height of editor
        maxHeight: null,             // set maximum height of editor
        // focus: true                 // set focus to editable area after initializing summernote
      });
    })
  </script>
@endsection