<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="all,follow">
  <!-- Bootstrap CSS-->
  <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/bootstrap/css/bootstrap.min.css') }}">
  <!-- Font Awesome CSS-->
  <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/font-awesome/css/font-awesome.min.css') }}">
  <!-- Custom icon font-->
  <link rel="stylesheet" href="{{ asset('assets/frontend/css/fontastic.css') }}">
  <!-- Google fonts - Open Sans-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
  <!-- Fancybox-->
  <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/@fancyapps/fancybox/jquery.fancybox.min.css') }}">
  <!-- theme stylesheet-->
  <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.default.css') }}" id="theme-stylesheet">
  <!-- Custom stylesheet - for your changes-->
  <link rel="stylesheet" href="{{ asset('assets/frontend/css/custom.css') }}">
  <!-- Favicon-->
  <link rel="shortcut icon" href="{{ asset('assets/admin/images/logo/favicon.png') }}">
  <!-- Tweaks for older IEs--><!--[if lt IE 9]>
  <script src="{{ asset('assets/frontend/js/html5shiv.min.js') }}"></script>
  <script src="{{ asset('assets/frontend/js/respond.min.js') }}"></script><![endif]-->

  @yield('stylesheet')
</head>
<body>
<header class="header">
  <!-- Main Navbar-->
  <nav class="navbar navbar-expand-lg">
    <div class="search-area">
      <div class="search-area-inner d-flex align-items-center justify-content-center">
        <div class="close-btn"><i class="icon-close"></i></div>
        <div class="row d-flex justify-content-center">
          <div class="col-md-8">
            <form action="#">
              <div class="form-group">
                <input type="search" name="search" id="search" placeholder="What are you looking for?">
                <button type="submit" class="submit"><i class="icon-search-1"></i></button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <!-- Navbar Brand -->
      <div class="navbar-header d-flex align-items-center justify-content-between">
        <!-- Navbar Brand --><a href="{{ route('home') }}" class="navbar-brand">Bootstrap Blog</a>
        <!-- Toggle Button-->
        <button type="button" data-toggle="collapse" data-target="#navbarcollapse" aria-controls="navbarcollapse" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span></span><span></span><span></span></button>
      </div>
      <!-- Navbar Menu -->
      <div id="navbarcollapse" class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="{{ route('home') }}" class="nav-link active ">Home</a>
          </li>
          <li class="nav-item"><a href="blog.html" class="nav-link ">Blog</a>
          </li>
          <li class="nav-item"><a href="post.html" class="nav-link ">Post</a>
          </li>
          <li class="nav-item"><a href="#" class="nav-link ">Contact</a>
          </li>
          <li class="nav-item"><a href="{{ route('login') }}" class="nav-link ">Login</a>
          </li>
          <li class="nav-item"><a href="{{ route('register') }}" class="nav-link ">Registration</a>
          </li>
        </ul>
        <div class="navbar-text"><a href="#" class="search-btn"><i class="icon-search-1"></i></a></div>
      </div>
    </div>
  </nav>
</header>

  @yield('content')

<!-- Page Footer-->
<footer class="main-footer">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="logo">
          <h6 class="text-white">Bootstrap Blog</h6>
        </div>
        <div class="contact-details">
          <p>53 Broadway, Broklyn, NY 11249</p>
          <p>Phone: (020) 123 456 789</p>
          <p>Email: <a href="mailto:info@company.com">Info@Company.com</a></p>
          <ul class="social-menu">
            <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="fa fa-behance"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="fa fa-pinterest"></i></a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-4">
        <div class="menus d-flex">
          <ul class="list-unstyled">
            <li> <a href="#">My Account</a></li>
            <li> <a href="#">Add Listing</a></li>
            <li> <a href="#">Pricing</a></li>
            <li> <a href="#">Privacy &amp; Policy</a></li>
          </ul>
          <ul class="list-unstyled">
            <li> <a href="#">Our Partners</a></li>
            <li> <a href="#">FAQ</a></li>
            <li> <a href="#">How It Works</a></li>
            <li> <a href="#">Contact</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="copyrights">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <p>&copy; 2020. All rights reserved.</p>
        </div>
        <div class="col-md-6 text-right"><p>Blog By RAST</p></div>
      </div>
    </div>
  </div>
</footer>
<!-- JavaScript files-->
<script src="{{ asset('assets/frontend/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/frontend/vendor/popper.js/umd/popper.min.js') }}"></script>
<script src="{{ asset('assets/frontend/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/frontend/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
<script src="{{ asset('assets/frontend/vendor/@fancyapps/fancybox/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/front.js') }}"></script>
@yield('script')
</body>
</html>