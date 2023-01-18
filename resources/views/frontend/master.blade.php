<!DOCTYPE html>
<html lang="en">

<head>
  <title>@yield('title')</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('/frontend/fonts/icomoon/style.css')}}">

  <link rel="stylesheet" href="{{asset('/frontend/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('/frontend/css/jquery-ui.css')}}">
  <link rel="stylesheet" href="{{asset('/frontend/css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('/frontend/css/owl.theme.default.min.css')}}">
  <link rel="stylesheet" href="{{asset('/frontend/css/owl.theme.default.min.css')}}">

  <link rel="stylesheet" href="{{asset('/frontend/css/jquery.fancybox.min.css')}}">

  <link rel="stylesheet" href="{{asset('/frontend/css/bootstrap-datepicker.css')}}">

  <link rel="stylesheet" href="{{asset('/frontend/fonts/flaticon/font/flaticon.css')}}">

  <link rel="stylesheet" href="{{asset('/frontend/css/aos.css')}}">
  <link href="{{asset('/frontend/css/jquery.mb.YTPlayer.min.css')}}" media="all" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="{{asset('/frontend/css/style.css')}}">



</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    @include('frontend.partials.header')
    @yield('content')
    @include('frontend.partials.footer')

  </div>
  <!-- .site-wrap -->


  <!-- loader -->
  <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#51be78" />
    </svg></div>

  <script src="{{asset('/frontend/js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{asset('/frontend/js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{asset('/frontend/js/jquery-ui.js')}}"></script>
  <script src="{{asset('/frontend/js/popper.min.js')}}"></script>
  <script src="{{asset('/frontend/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('/frontend/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('/frontend/js/jquery.stellar.min.js')}}"></script>
  <script src="{{asset('/frontend/js/jquery.countdown.min.js')}}"></script>
  <script src="{{asset('/frontend/js/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{asset('/frontend/js/jquery.easing.1.3.js')}}"></script>
  <script src="{{asset('/frontend/js/aos.js')}}"></script>
  <script src="{{asset('/frontend/js/jquery.fancybox.min.js')}}"></script>
  <script src="{{asset('/frontend/js/jquery.sticky.js')}}"></script>
  <script src="{{asset('/frontend/js/jquery.mb.YTPlayer.min.js')}}"></script>
  <script src="{{asset('/frontend/js/main.js')}}"></script>
  @stack('scripts')

</body>

</html>