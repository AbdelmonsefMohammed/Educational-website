<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
  <!-- Mobile Specific Meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Favicon -->
  <link rel="shortcut icon" href="img/fav.png" />

  <!-- meta character set -->
  <meta charset="UTF-8" />
  <!-- Site Title -->
  <title>{{ config('app.name', 'E_learning') }}</title>

  <link href="https://fonts.googleapis.com/css?family=Playfair+Display:900|Roboto:400,400i,500,700" rel="stylesheet" />
  <!--
      CSS
      =============================================
    -->
  <link rel="stylesheet" href="{{ asset('frontend') }}/css/linearicons.css" />
  <link rel="stylesheet" href="{{ asset('frontend') }}/css/font-awesome.min.css" />
  <link rel="stylesheet" href="{{ asset('frontend') }}/css/bootstrap.css" />
  <link rel="stylesheet" href="{{ asset('frontend') }}/css/magnific-popup.css" />
  <link rel="stylesheet" href="{{ asset('frontend') }}/css/owl.carousel.css" />
  <link rel="stylesheet" href="{{ asset('frontend') }}/css/nice-select.css">
  <link rel="stylesheet" href="{{ asset('frontend') }}/css/hexagons.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/themify-icons/0.1.2/css/themify-icons.css" />
  <link rel="stylesheet" href="{{ asset('frontend') }}/css/main.css" />

  @yield('css')
</head>

<body>
    @auth()
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
    @endauth
      <!-- ================ Start Header Area ================= -->
  <header class="default-header">
    <nav class="navbar navbar-expand-lg  navbar-light">
      <div class="container">
        <a class="navbar-brand pt-0" href="/">
          <img style="width: 160px;height: 40px;" class="navbar-brand-img" src="{{ asset('argon') }}/img/brand/e_learning.png" alt="" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="lnr lnr-menu"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent">
          <ul class="navbar-nav">
            <li><a href="/">Home</a></li>
            <li><a href="/contact">Contact</a></li>
            <li><a href="/courses">Courses</a></li>
            <!-- Dropdown -->

            <li class="dropdown">
                
                  @auth
                  <a class="@auth dropdown-toggle @endauth" href="#" data-toggle="dropdown">
                  {{auth()->user()->name}}
                  @endauth
                  @guest
                    <a class="" href="{{ route('login') }}">
                        {{ __('Login') }}
                    </a> 
                  @endguest
                </a>
                @auth
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="/profile">Profile</a>
                  <a class="dropdown-item" href="/mycourses">My Courses</a>
                  <a class="dropdown-item" href="{{ route('logout') }}"onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">Logout</a>
                </div>
                @endauth
              </li>

            <li>
              <button class="search">
                <span class="lnr lnr-magnifier" id="search"></span>
              </button>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="search-input" id="search-input-box">
      <div class="container">
        <form method="get" action="/search" class="d-flex justify-content-between">
          <input name="q" type="text" class="form-control" id="search-input" placeholder="Search Here" />
          <button type="submit" class="btn"></button>
          <span class="lnr lnr-cross" id="close-search" title="Close Search"></span>
        </form>
      </div>
    </div>
  </header>
    <!-- ================ End Header Area ================= -->

@yield('frontendcontent')

  
  @include('layouts.frontend.footer')
  <script src="{{ asset('frontend') }}/js/vendor/jquery-2.2.4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
    crossorigin="anonymous"></script>
  <script src="{{ asset('frontend') }}/js/vendor/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
  <script src="{{ asset('frontend') }}/js/jquery.ajaxchimp.min.js"></script>
  <script src="{{ asset('frontend') }}/js/jquery.magnific-popup.min.js"></script>
  <script src="{{ asset('frontend') }}/js/parallax.min.js"></script>
  <script src="{{ asset('frontend') }}/js/owl.carousel.min.js"></script>
  <script src="{{ asset('frontend') }}/js/jquery.sticky.js"></script>
  <script src="{{ asset('frontend') }}/js/hexagons.min.js"></script>
  <script src="{{ asset('frontend') }}/js/jquery.counterup.min.js"></script>
  <script src="{{ asset('frontend') }}/js/waypoints.min.js"></script>
  <script src="{{ asset('frontend') }}/js/jquery.nice-select.min.js"></script>
  <script src="{{ asset('frontend') }}/js/main.js"></script>

  @yield('javascripts')
</body>

</html>