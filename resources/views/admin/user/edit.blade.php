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
              <h2 class="panel-title">Edit User</h2>
            </header>
            <div class="panel-body">
              <div class="row">
                <div class="col-lg-12 col-md-12 col-xl-12 text-right mb-3">
                  <a href="{{ route('admin.user.view') }}" class="brn btn-success btn-sm">Users</a>
                </div>
              </div>
              @if(session()->has('status'))
                {!! session()->get('status') !!}
              @endif

              <form action="{{ route('admin.user.edit', $user->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="control-label">Name<span class="text-danger">*</span></label>
                      <input type="text" name="name" placeholder="Name" required value="{{ $user->name }}"
                             class="form-control @error('name') is-invalid @enderror">
                      @error('name')
                      <strong class="text-danger">{{ $errors->first('name') }}</strong>
                      @enderror
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="control-label">Email<span class="text-danger">*</span></label>
                      <input type="email" name="email" placeholder="Email" required value="{{ $user->email }}"
                             class="form-control @error('email') is-invalid @enderror">
                      @error('email')
                      <strong class="text-danger">{{ $errors->first('email') }}</strong>
                      @enderror
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="control-label">Phone No</label>
                      <input type="number" name="phone" placeholder="Phone No" value="{{ $user->phone }}"
                             class="form-control @error('phone') is-invalid @enderror">
                      @error('phone')
                      <strong class="text-danger">{{ $errors->first('phone') }}</strong>
                      @enderror
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="control-label">Password<span class="text-danger">*</span></label>
                      <input type="password" name="password" placeholder="Password"
                             class="form-control @error('password') is-invalid @enderror">
                      @error('password')
                      <strong class="text-danger">{{ $errors->first('password') }}</strong>
                      @enderror
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="control-label">Type<span class="text-danger">*</span></label>
                      <select name="type" required class="form-control @error('type') is-invalid @enderror">
                        <option value="">Choose a Type</option>
                        <option value="admin" @if($user->type == 'admin') selected @endif>Admin</option>
                        <option value="customer" @if($user->type == 'customer') selected @endif>Customer</option>
                      </select>
                      @error('type')
                      <strong class="text-danger">{{ $errors->first('type') }}</strong>
                      @enderror
                    </div>
                  </div>
                  <div class="col-sm-6 text-center">
                    <div class="form-group">
                      <label for="" class="col-form-label">Status</label>
                      <div class="">
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                          <label class="btn btn-primary @if(strtolower($user->status) == 'active')active @endif" style="cursor: pointer">
                            <input type="radio" name="status" value="active" @if(strtolower($user->status) == 'active') checked @endif> Active
                          </label>
                          <label class="btn btn-primary @if(strtolower($user->status) == 'inactive')active @endif" style="cursor: pointer">
                            <input type="radio" name="status" value="inactive"
                                   @if(strtolower($user->status) == 'inactive') checked @endif> Inactive
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