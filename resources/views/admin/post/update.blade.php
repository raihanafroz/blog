@extends('layouts.admin_layout')

@section('stylesheet')
  <link href="{{ asset('assets/admin/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
  <link href="{{ asset('assets/admin/plugins/summernote/summernote-bs4.css') }}" rel="stylesheet"/>
@endsection

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <section class="panel">
            <header class="panel-heading">
              <h2 class="panel-title">Edit Post</h2>
            </header>
            <div class="panel-body">
              <div class="row">
                <div class="col-lg-12 col-md-12 col-xl-12 text-right mb-3">
                  <a href="{{ route('admin.post.store') }}" class="brn btn-success btn-sm">Posts</a>
                </div>
              </div>
              @if(session()->has('status'))
                {!! session()->get('status') !!}
              @endif

              <form action="{{ route('admin.post.update', $post) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label class="control-label">Title<span class="text-danger">*</span></label>
                      <input type="text" name="title" placeholder="Post Title" required value="{{ $post->title }}"
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
                          <option value="{{ $category->id }}"
                                  @if($post->category_id == $category->id) selected @endif>{{ $category->name }}</option>
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
                          <option value="{{ $tag->id }}"
                                  @foreach($post->tags as $postTag)@if($postTag->id == $tag->id) selected @endif @endforeach>{{ $tag->name }}</option>
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
                      <textarea name="body" class="summernote">{{ $post->body }}</textarea>
                      @error('body')
                      <strong class="text-danger">{{ $errors->first('body') }}</strong>
                      @enderror
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label class="control-label">Thumbnail</label>
                      <div class="row">
                        <div class="col-12 mb-1">
                          @if($media = $post->getFirstMedia('thumbnail'))
                            <img src="{{ $media->getUrl()  }}" alt="" width="300" height="150">
                          @endif
                        </div>
                        <div class="col-12">
                          <input type="file" name="thumbnail" placeholder="Choose a Image"
                                 class="form-control @error('thumbnail') is-invalid @enderror">
                        </div>
                      </div>
                      @error('thumbnail')
                      <strong class="text-danger">{{ $errors->first('thumbnail') }}</strong>
                      @enderror
                    </div>
                  </div>
                </div>
                @if($images = $post->getMedia('images'))
                  <div class="row">
                    @foreach($images as $image)
                      <div class="col-sm-6 col-md-4 col lg-3 p-2 text-center item-image">
                        <img src="{{ $image->getUrl() }}" alt="" width="300" height="150">
                        <h2 class="text-center">
                          <span type="button" class="btn btn-outline-danger btn-sm btn-delete"
                                data-url="{{ route('admin.ajax.delete.post.image', $post->id) }}"
                                data-id="{{ $image->getAttribute('id') }}">Delete</span>
                        </h2>
                      </div>
                    @endforeach
                  </div>
                @endif
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="control-label">Image</label>
                      <input type="file" name="image[]" multiple placeholder="Choose a Image"
                             class="form-control @error('image') is-invalid @enderror">
                      @error('image')
                      <strong class="text-danger">{{ $errors->first('image') }}</strong>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="" class="col-form-label">Status</label>
                      <div class="">
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                          <label
                            class="btn btn-primary @if(!$post->status) active @endif @if(strtolower($post->status) == 'active')active @endif"
                            style="cursor: pointer">
                            <input type="radio" name="status" value="active"
                                   @if(!$post->status) checked
                                   @endif @if(strtolower($post->status) == 'active') checked @endif> Active
                          </label>
                          <label class="btn btn-primary @if(strtolower($post->status) == 'inactive')active @endif"
                                 style="cursor: pointer">
                            <input type="radio" name="status" value="inactive"
                                   @if(strtolower($post->status) == 'inactive') checked @endif> Inactive
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

      $('.btn-delete').click(function () {
        var pid = $(this).data('id');
        var url = $(this).data('url');
        var $this = $(this)
        $.ajax({
          url: url,
          method: "delete",
          dataType: "html",
          data: {imageId: pid},
          success: function (data) {
            if (data === "success") {
              $this.closest('.item-image').css('background-color', 'red').fadeOut();
            }
          }
        });
      })
    })
  </script>
@endsection