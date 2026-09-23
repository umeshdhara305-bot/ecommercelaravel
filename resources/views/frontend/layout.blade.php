<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>E-Shopper</title>

    <!-- CSS -->
  <link href="{{ asset('assets/frontend/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/frontend/css/font-awesome.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/frontend/css/prettyPhoto.css') }}" rel="stylesheet">
<link href="{{ asset('assets/frontend/css/price-range.css') }}" rel="stylesheet">
<link href="{{ asset('assets/frontend/css/animate.css') }}" rel="stylesheet">
<link href="{{ asset('assets/frontend/css/main.css') }}" rel="stylesheet">
<link href="{{ asset('assets/frontend/css/responsive.css') }}" rel="stylesheet">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/frontend/images/ico/favicon.ico') }}">
</head>



<body>

    {{-- Header --}}
    @include('frontend.header')

    {{-- 🔥 THIS IS MAIN CONTENT --}}
    @yield('content')

    {{-- Footer --}}
    @include('frontend.footer')

   <!-- JS -->
<script src="{{ asset('assets/frontend/js/jquery.js') }}"></script>
<script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.scrollUp.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/price-range.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.prettyPhoto.js') }}"></script>
<script src="{{ asset('assets/frontend/js/main.js') }}"></script>
@stack('scripts')
</body>
</html>