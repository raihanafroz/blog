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
              <div class="row">
                <div class="col-lg-8 col-md-8 col-xl-8">
                  <h2 class="panel-title">Post Details</h2>
                </div>
                <div class="col-lg-4 col-md-4 col-xl-4 text-right mb-3">
                  <a href="{{ route('admin.post.index') }}" class="brn btn-success btn-sm">Posts</a>
                </div>
              </div>
            </header>
            <div class="panel-body">
              <div class="row">
                <div class="col-12">
                  <div class="row">
                    <div class="col-12 mt-4 mb-4 text-center">
                      <div class="text-left">
                        <h6 >Name: {{ $post->author->name }}</h6>
                        <h6 >Email: {{ $post->author->email }}</h6>
                        <h6 >Phone: {{ $post->author->phone }}</h6>
                      </div>
                    </div>
                    <div class="col-md-12 col-xl-12 text-center">
                      <h4 class="m-0">{{ $post->title }}</h4>
                      <span style="color: #737373">{{ date('F d, Y', strtotime($post->created_at)) }}</span><br>
                      <span class="mr-3" style="color: #737373"><span><i class="mr-1 fa fa-thumbs-o-up"></i>{{ $post->like }} </span></span>
                      <span class="mr-3" style="color: #737373"><span><i class="mr-1 fa fa-thumbs-o-down"></i>{{ $post->dislike }}</span></span>
                      <span class="mr-3" style="color: #737373"><span><i class="mr-1 fa fa-eye"></i>{{ $post->views }} </span></span>
                    </div>
                    <div class="col-md-12 text-center pt-4">
                      <div class="row">
                        <div class="col-12 text-left">
                          <h4 class="m-1"><span style="color: #737373">Category: </span>{{ $post->category->name }}</h4>
                        </div>
                        <div class="col-12 text-left">
                          @php($class = collect([ 'badge-indigo', 'badge-purple', 'badge-pink', 'badge-orange', 'badge-brown', 'badge-primary', 'badge-secondary', 'badge-success', 'badge-danger', 'badge-warning', 'badge-info', 'badge-dark' ]))
                          <p style="font-size: 16px">
                            <span style="color: #737373">Tags: </span>
                            @foreach($post->tags as $tag)
                              <span class="badge {{ $class->random() }} mb-1">{{ $tag->name }}</span>
                            @endforeach
                          </p>
                        </div>
                      </div>
                      <img style="max-width: 100%"
                        src="{{ $post->getFirstMedia('thumbnail') ? $post->getFirstMedia('thumbnail')->getUrl() : null}}"
                        alt="">
                    </div>
                    <div class=" col-12 pt-2">
                      <p>{!! $post->body !!}</p>
                    </div>
                    <div class="col-12">
                        @foreach($post->getMedia('images') as $image)
                          <img src="{{ $image->getUrl() }}"
                               style="max-height: 300px; max-width: 250px; padding: 10px; border: 1px dashed black; border-radius: 10px"
                               alt="">
                        @endforeach
                    </div>
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

