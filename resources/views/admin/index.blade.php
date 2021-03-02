@extends('layouts.admin_layout')

@section('stylesheet')

@endsection


@section('content')
  <div class="container-fluid">

    <div class="row">
      <div class="col-md-6 col-lg-6 col-xl-3">
        <div class="mini-stat clearfix bg-white">
          <span class="mini-stat-icon bg-purple mr-0 float-right"><i class="mdi mdi-basket"></i></span>
          <div class="mini-stat-info">
            <span class="counter text-purple">25140</span>
            Total Sales
          </div>
          <div class="clearfix"></div>
          <p class=" mb-0 m-t-20 text-muted">Total income: $22506 <span class="pull-right"><i
                class="fa fa-caret-up m-r-5"></i>10.25%</span></p>
        </div>
      </div>
      <div class="col-md-6 col-lg-6 col-xl-3">
        <div class="mini-stat clearfix bg-white">
          <span class="mini-stat-icon bg-blue-grey mr-0 float-right"><i class="mdi mdi-black-mesa"></i></span>
          <div class="mini-stat-info">
            <span class="counter text-blue-grey">65241</span>
            New Orders
          </div>
          <div class="clearfix"></div>
          <p class="text-muted mb-0 m-t-20">Total income: $22506 <span class="pull-right"><i
                class="fa fa-caret-up m-r-5"></i>10.25%</span></p>
        </div>
      </div>
      <div class="col-md-6 col-lg-6 col-xl-3">
        <div class="mini-stat clearfix bg-white">
          <span class="mini-stat-icon bg-brown mr-0 float-right"><i class="mdi mdi-buffer"></i></span>
          <div class="mini-stat-info">
            <span class="counter text-brown">85412</span>
            New Users
          </div>
          <div class="clearfix"></div>
          <p class="text-muted mb-0 m-t-20">Total income: $22506 <span class="pull-right"><i
                class="fa fa-caret-up m-r-5"></i>10.25%</span></p>
        </div>
      </div>
      <div class="col-md-6 col-lg-6 col-xl-3">
        <div class="mini-stat clearfix bg-white">
          <span class="mini-stat-icon bg-teal mr-0 float-right"><i class="mdi mdi-coffee"></i></span>
          <div class="mini-stat-info">
            <span class="counter text-teal">20544</span>
            Unique Visitors
          </div>
          <div class="clearfix"></div>
          <p class="text-muted mb-0 m-t-20">Total income: $22506 <span class="pull-right"><i
                class="fa fa-caret-up m-r-5"></i>10.25%</span></p>
        </div>
      </div>
    </div>

    <!-- end row -->
    <div class="row">
      <div class="col-xl-3">
        <div class="card m-b-20">
          <div class="card-body">
            <h4 class="mt-0 header-title m-b-30">Recent Stock</h4>
            <div class="text-center">
              <input class="knob" data-width="120" data-height="120" data-linecap=round
                     data-fgColor="#ffbb44" value="80" data-skin="tron" data-angleOffset="180"
                     data-readOnly=true data-thickness=".1"/>

              <div class="clearfix"></div>
              <a href="#" class="btn btn-sm btn-warning m-t-20">View All Data</a>
              <ul class="list-inline row m-t-30 clearfix">
                <li class="col-6">
                  <p class="m-b-5 font-18 font-600">7,541</p>
                  <p class="mb-0">Mobile Phones</p>
                </li>
                <li class="col-6">
                  <p class="m-b-5 font-18 font-600">125</p>
                  <p class="mb-0">Desktops</p>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3">
        <div class="card m-b-20">
          <div class="card-body">
            <h4 class="mt-0 header-title m-b-30">Purchase Order</h4>
            <div class="text-center">
              <input class="knob" data-width="120" data-height="120" data-linecap=round
                     data-fgColor="#4ac18e" value="68" data-skin="tron" data-angleOffset="180"
                     data-readOnly=true data-thickness=".1"/>
              <div class="clearfix"></div>
              <a href="#" class="btn btn-sm btn-success m-t-20">View All Data</a>
              <ul class="list-inline row m-t-30 clearfix">
                <li class="col-6">
                  <p class="m-b-5 font-18 font-600">2,541</p>
                  <p class="mb-0">Mobile Phones</p>
                </li>
                <li class="col-6">
                  <p class="m-b-5 font-18 font-600">874</p>
                  <p class="mb-0">Desktops</p>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3">
        <div class="card m-b-20">
          <div class="card-body">
            <h4 class="mt-0 header-title m-b-30">Shipped Orders</h4>
            <div class="text-center">
              <input class="knob" data-width="120" data-height="120" data-linecap=round
                     data-fgColor="#8d6e63" value="39" data-skin="tron" data-angleOffset="180"
                     data-readOnly=true data-thickness=".1"/>

              <div class="clearfix"></div>
              <a href="#" class="btn btn-sm btn-brown m-t-20">View All Data</a>
              <ul class="list-inline row m-t-30 clearfix">
                <li class="col-6">
                  <p class="m-b-5 font-18 font-600">1,154</p>
                  <p class="mb-0">Mobile Phones</p>
                </li>
                <li class="col-6">
                  <p class="m-b-5 font-18 font-600">89</p>
                  <p class="mb-0">Desktops</p>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3">
        <div class="card m-b-20">
          <div class="card-body">
            <h4 class="mt-0 header-title m-b-30">Cancelled Orders</h4>
            <div class="text-center">
              <input class="knob" data-width="120" data-height="120" data-linecap=round
                     data-fgColor="#90a4ae" value="95" data-skin="tron" data-angleOffset="180"
                     data-readOnly=true data-thickness=".1"/>
              <div class="clearfix"></div>
              <a href="#" class="btn btn-sm btn-blue-grey m-t-20">View All Data</a>
              <ul class="list-inline row m-t-30 clearfix">
                <li class="col-6">
                  <p class="m-b-5 font-18 font-600">95</p>
                  <p class="mb-0">Mobile Phones</p>
                </li>
                <li class="col-6">
                  <p class="m-b-5 font-18 font-600">25</p>
                  <p class="mb-0">Desktops</p>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div><!-- container -->
@endsection


@section('script')

@endsection