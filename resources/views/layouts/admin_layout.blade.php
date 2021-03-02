<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <title>Admin | Dashboard</title>
  <meta content="E-commerce Lite Version" name="description"/>
  <meta content="MD. Raihan Afroz" name="author"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>

  <meta name="csrf-token" content="{{ csrf_token() }}">


  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/frontend/img/logo/favicon.png') }}">


  <link href="{{ asset('assets/admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('assets/admin/css/icons.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('assets/admin/css/style.css') }}" rel="stylesheet" type="text/css">

  <style>
    body{
      font-size: 14px;
    }
    label{
      font-size: 12px;
    }
    .form-control{
      font-size: 14px;
    }
  </style>
  @yield('stylesheet')


</head>
<body class="fixed-left">
<!-- Loader -->
<div id="preloader">
  <div id="status">
    <div class="spinner"></div>
  </div>
</div>

<div id="wrapper">
  <!-- ========== Left Sidebar Start ========== -->
  <div class="left side-menu">

    <!-- LOGO -->
    <div class="topbar-left">
      <div class="">
        <a href="{{ route('home') }}" class="logo"><img src="{{ asset('assets/admin/images/logo-sm.png') }}" height="36" alt="logo"></a>
      </div>
    </div>
    <div class="sidebar-inner slimscrollleft">
      <div id="sidebar-menu">
        <ul>
          {{--<li class="menu-title">Main</li>--}}
          <li>
            <a href="{{ route('admin.dashboard') }}" class="waves-effect"><i class="mdi mdi-view-dashboard"></i> <span>  Dashboard</span> </a>
          </li>

          <li class="menu-title">Blog</li>

          {{-- Category --}}
          <li class="has_sub">
            <a class="waves-effect"><i class="mdi mdi-view-list"></i><span> Category <span
                  class="pull-right"><i class="mdi mdi-chevron-right"></i></span> </span></a>
            <ul class="list-unstyled">
              <li><a href="{{ route('admin.categories.create') }}">Create</a></li>
              <li><a href="{{ route('admin.categories.index') }}">List</a></li>
            </ul>
          </li>

          {{-- Tag --}}
          <li class="has_sub">
            <a class="waves-effect"><i class="mdi mdi-view-carousel"></i><span> Tag <span
                  class="pull-right"><i class="mdi mdi-chevron-right"></i></span> </span></a>
            <ul class="list-unstyled">
              <li><a href="{{ route('admin.tag.create') }}">Create</a></li>
              <li><a href="{{ route('admin.tag.index') }}">List</a></li>
            </ul>
          </li>

          {{--<li class="has_sub">--}}
            {{--<a class="waves-effect"><i class="mdi mdi-view-week"></i><span> Sub Category <span--}}
                  {{--class="pull-right"><i class="mdi mdi-chevron-right"></i></span> </span></a>--}}
            {{--<ul class="list-unstyled">--}}
              {{--<li><a href="{{ route('admin.sub_category.add') }}">Add</a></li>--}}
              {{--<li><a href="{{ route('admin.sub_category.view') }}">View</a></li>--}}
            {{--</ul>--}}
          {{--</li>--}}

          {{--<li class="has_sub">--}}
            {{--<a class="waves-effect"><i class="mdi mdi-view-grid"></i><span> Product<span--}}
                  {{--class="pull-right"><i class="mdi mdi-chevron-right"></i></span> </span></a>--}}
            {{--<ul class="list-unstyled">--}}
              {{--<li><a href="{{ route('admin.sub_category.add') }}">Add User</a></li>--}}
              {{--<li><a href="{{ route('admin.sub_category.view') }}">View User</a></li>--}}
            {{--</ul>--}}
          {{--</li>--}}




          <li class="menu-title">System</li>
          <li class="has_sub">
            <a class="waves-effect"><i class="mdi mdi-account-multiple"></i><span> User <span
                  class="pull-right"><i class="mdi mdi-chevron-right"></i></span> </span></a>
            <ul class="list-unstyled">
              <li><a href="{{ route('admin.user.add') }}">Add User</a></li>
              <li><a href="{{ route('admin.user.view') }}">View User</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <div class="clearfix"></div>
    </div> <!-- end sidebarinner -->
  </div>
  <!-- Left Sidebar End -->

  <!-- Start right Content here -->
  <div class="content-page">

    <!-- Start content -->
    <div class="content">

      <!-- Top Bar Start -->
      <div class="topbar">

        <nav class="navbar-custom">
          <!-- Search input -->
          <div class="search-wrap" id="search-wrap">
            <div class="search-bar">
              <input class="search-input" type="search" placeholder="Search"/>
              <a href="#" class="close-search toggle-search" data-target="#search-wrap">
                <i class="mdi mdi-close-circle"></i>
              </a>
            </div>
          </div>

          <ul class="list-inline float-right mb-0">
            <!-- Fullscreen -->
            <li class="list-inline-item dropdown notification-list hidden-xs-down">
              <a class="nav-link waves-effect" href="#" id="btn-fullscreen">
                <i class="mdi mdi-fullscreen noti-icon"></i>
              </a>
            </li>

            <!-- notification-->
            {{--<li class="list-inline-item dropdown notification-list">
              <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button"
                 aria-haspopup="false" aria-expanded="false">
                <i class="ion-ios7-bell noti-icon"></i>
                <span class="badge badge-danger noti-icon-badge">3</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg">
                <!-- item-->
                <div class="dropdown-item noti-title">
                  <h5>Notification (3)</h5>
                </div>
                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item active">
                  <div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i></div>
                  <p class="notify-details"><b>Your order is placed</b>
                    <small class="text-muted">Dummy text of the printing and typesetting industry.</small>
                  </p>
                </a>
                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                  <div class="notify-icon bg-warning"><i class="mdi mdi-message"></i></div>
                  <p class="notify-details"><b>New Message received</b>
                    <small class="text-muted">You have 87 unread messages</small>
                  </p>
                </a>
                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                  <div class="notify-icon bg-info"><i class="mdi mdi-martini"></i></div>
                  <p class="notify-details"><b>Your item is shipped</b>
                    <small class="text-muted">It is a long established fact that a reader will</small>
                  </p>
                </a>

                <!-- All-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                  View All
                </a>
              </div>
            </li>--}}

            <!-- User-->
            <li class="list-inline-item dropdown notification-list">
              <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#"
                 role="button"
                 aria-haspopup="false" aria-expanded="false">
                <img src="{{ asset('assets/admin/images/users/avatar-1.jpg') }}" alt="user" class="rounded-circle">
              </a>
              <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                <a class="dropdown-item" href="#"><i class="dripicons-user text-muted"></i> Profile</a>
                <a class="dropdown-item" href="#"><i class="dripicons-gear text-muted"></i> Settings</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('admin.logout') }}"><i class="dripicons-exit text-muted"></i> Logout</a>
              </div>
            </li>
          </ul>
          <!-- Page title -->
          <ul class="list-inline menu-left mb-0">
            <li class="list-inline-item">
              <button type="button" class="button-menu-mobile open-left waves-effect">
                <i class="ion-navicon"></i>
              </button>
            </li>
            <li class="hide-phone list-inline-item app-search">
              <h3 class="page-title">Dashboard</h3>
            </li>
          </ul>
          <div class="clearfix"></div>
        </nav>
      </div>
      <!-- Top Bar End -->

      <div class="page-content-wrapper">
        @yield('content')
      </div> <!-- Page content Wrapper -->
    </div>
    <footer class="footer">
      © 2021 Blog <span class="text-muted hidden-xs-down pull-right">Crafted with <i
          class="mdi mdi-heart text-danger"></i> by RAST</span>
    </footer>
  </div>
</div>

<script src="{{ asset('assets/admin/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/modernizr.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('assets/admin/js/waves.js') }}"></script>
<script src="{{ asset('assets/admin/js/jquery.nicescroll.js') }}"></script>
<script src="{{ asset('assets/admin/js/jquery.scrollTo.min.js') }}"></script>


<!-- App js -->
<script src="{{ asset('assets/admin/js/app.js') }}"></script>
@include('sweetalert::alert')

<script>
  $(document).ready(function () {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
  })
</script>
  @yield('script')
</body>
</html>