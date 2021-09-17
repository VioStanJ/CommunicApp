<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CommuniC::App</title>

    <!-- Favicon -->
    <link rel="icon" href="./dist/media/img/favicon.png" type="image/png">

    <!-- Google Nunito font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700&display=swap" rel="stylesheet">

    <!-- Material design icons -->
    <link href="./dist/icons/materialicons/css/materialdesignicons.min.css" rel="stylesheet">

    <!-- Bundle styles -->
    <link rel="stylesheet" href="dist/vendor/bundle.css">

    <!-- Slick -->
    <link rel="stylesheet" href="dist/vendor/slick/slick-theme.css">
    <link rel="stylesheet" href="dist/vendor/slick/slick.css">

    <!-- Fancybox -->
    <link rel="stylesheet" href="dist/vendor/fancybox/jquery.fancybox.min.css" type="text/css"/>

    <!-- Aos animate -->
    <link rel="stylesheet" href="dist/vendor/aos/aos.css" type="text/css"/>

    <!-- Landing page styles -->
    <link rel="stylesheet" href="./dist/css/landing-page.min.css">
</head>
<body>

<!-- Navbar -->
<nav class="navbar fixed-top bg-white navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="./index.html">
            <img src="./dist/media/img/logo-full.png" alt="logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            {{-- <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="./index.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" target="_blank" href="chat.html">Tinno Chat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./features.html">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Auth</a>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" target="_blank" href="login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" target="_blank" href="register">Register</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pages</a>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="./pricing.html">Pricing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./contact.html">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" target="_blank" href="./email-template.html">Email Template</a>
                        </li>
                    </ul>
                </li>
            </ul> --}}
            {{-- <a href="#" class="btn btn-primary ml-auto">Buy Now</a>     --}}
        </div>
    </div>
</nav>
<!-- ./ Navbar -->

<!-- Hero -->
<section class="py-8">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-lg-5 text-center text-lg-left mb-5 mb-lg-0">
                <div data-aos="zoom-in-right">
                    <h1 class="hero-title">
                        <strong>Tinno</strong> is a web <span class="text-primary">chat application template</span>.
                    </h1>
                    <p class="lead text-muted mb-5 mb-md-8">
                        <strong>Tinno</strong> is an HTML template created for developing written, audio and video
                        communication applications. Build your dream applications with advanced components and features.
                    </p>
                    <a href="/login" class="btn btn-primary hover-animate mr-2">
                        Login
                        <i class="mdi mdi-arrow-right ml-2 small"></i>
                    </a>
                    <a href="/register" class="btn btn-light-primary hover-animate">Register</a>
                </div>
            </div>
            <div class="col-12 col-lg-7">
                <div data-aos="zoom-in-left" class="img-skewed img-skewed-left">
                    <img src="./dist/media/img/landing/hero-image.jpg" class="img-fluid" alt="...">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ./ Hero -->




<!-- Bundle scripts -->
<script src="dist/vendor/bundle.js"></script>

<!-- Slick -->
<script src="dist/vendor/slick/slick.min.js"></script>

<!-- Fancybox -->
<script src="dist/vendor/fancybox/jquery.fancybox.min.js"></script>

<!-- Aos animate -->
<script src="dist/vendor/aos/aos.js"></script>

<!-- Landing page scripts -->
<script src="./dist/js/landing-page.min.js"></script>
</body>
</html>
