<!DOCTYPE html>
<html lang="zh-TW">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>@yield('title')</title>
  <!-- Bootstrap core CSS -->
  <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">
  <!-- Custom styles for backend -->
  <link href="{{ asset('css/frontend.css') }}" rel="stylesheet">
  <!-- Owl Css -->
  <link href="{{ asset('owlcarousel/assets/owl.carousel.css') }}" rel="stylesheet">
  <link href="{{ asset('owlcarousel/assets/owl.theme.default.css') }}" rel="stylesheet">
  <link href="{{ asset('fontawesome/css/all.css') }}" rel="stylesheet">

  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('jquery/jquery.min.js') }}"></script>
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
  <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('js/frontendIndex.js') }}"></script>
  <script src="{{ asset('owlcarousel/owl.carousel.js') }}"></script>
  @stack('head')
</head>
<body>
  @include('frontend.layouts.top')
  @include('frontend.layouts.navbar')
  @yield('content')
  
  
</body>
</html>