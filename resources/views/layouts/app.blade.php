<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CommunicApp - Home</title>

    <!-- Favicon -->
    <link rel="icon" href="./dist/media/img/favicon.png" type="image/png">

<!-- Google Nunito font -->
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700&display=swap" rel="stylesheet">

<!-- Themify icons -->
<link href="{{asset('dist/icons/themify/themify-icons.css')}}" rel="stylesheet">

<!-- Material design icons -->
<link href="{{asset('dist/icons/materialicons/css/materialdesignicons.min.css')}}" rel="stylesheet">

<!-- Bundle styles -->
<link rel="stylesheet" href="{{asset('dist/vendor/bundle.css')}}">

<!-- Slick -->
<link rel="stylesheet" href="{{asset('dist/vendor/slick/slick-theme.css')}}">
<link rel="stylesheet" href="{{asset('dist/vendor/slick/slick.css')}}">

<!-- Fancybox -->
<link rel="stylesheet" href="{{asset('dist/vendor/fancybox/jquery.fancybox.min.css')}}" type="text/css"/>

<!-- Intro js -->
<link rel="stylesheet" href="{{asset('dist/vendor/introjs/introjs.css')}}" type="text/css"/>

<!-- App styles -->
<link rel="stylesheet" href="{{asset('dist/css/app.min.css')}}">

{{-- Toastr --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

</head>
<body>

<!-- preloader -->
<div class="preloader">
    <img src="{{asset('dist/media/img/logo-2x.png')}}" alt="logo">
    <p class="lead font-weight-bold text-muted my-5">Loading CommunicApp...</p>
    <div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<!-- ./ preloader -->

    @yield('content')

<!-- ./ edit profile modal -->

<!-- Bundle scripts -->
<script src="{{asset('dist/vendor/bundle.js')}}"></script>

<!-- Feather icons -->
<script src="{{asset('dist/icons/feather/feather.min.js')}}"></script>

<!-- Slick -->
<script src="{{asset('dist/vendor/slick/slick.min.js')}}"></script>

<!-- Fancybox -->
<script src="{{asset('dist/vendor/fancybox/jquery.fancybox.min.js')}}"></script>

<!-- Intro js -->
<script src="{{asset('dist/vendor/introjs/intro.js')}}"></script>

<!-- Jquery Stopwatch -->
<script src="{{asset('dist/vendor/jquery.stopwatch.js')}}"></script>

<!-- Sweetalert2 -->
<script src="{{asset('dist/vendor/sweetalert2.js')}}"></script>

<!-- App scripts -->
<script src="{{asset('dist/js/app.min.js')}}"></script>

<!-- Examples -->
<script src="{{asset('dist/js/examples.js')}}"></script>

{{-- Toastr --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

@yield('script')
</body>
</html>
