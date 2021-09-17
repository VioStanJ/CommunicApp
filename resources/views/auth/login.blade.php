<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CommunicApp - Login</title>

    <!-- Favicon -->
    <link rel="icon" href="./dist/media/img/favicon.png" type="image/png">

    <!-- Google Nunito font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700&display=swap" rel="stylesheet">

    <!-- Material design icons -->
    <link href="./dist/icons/materialicons/css/materialdesignicons.min.css" rel="stylesheet">

    <!-- Bundle Styles -->
    <link rel="stylesheet" href="dist/vendor/bundle.css">

    <!-- Landing page styles -->
    <link rel="stylesheet" href="./dist/css/landing-page.min.css">
</head>
<body class="auth" style="background: url({{asset('./img/chat.jpg')}})">

<div class="form-wrapper" style="margin-top : 10px;">

    <!-- logo -->
    <div class="logo">
        <h1 class="hero-title" style="height: 20px; font-size : 30px;">
            <strong><a href="/" style="color : #000; text-decoration : none;">CommunicApp</a></strong>
        </h1>
    </div>
    <!-- ./ logo -->

    <h5>Sign in</h5>

    <!-- form -->
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group d-flex justify-content-between">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="remember" checked="" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember me</label>
            </div>
            <a href="{{route('password.request')}}">Reset password</a>
        </div>
        <button class="btn btn-primary">Sign in</button>


        <div class="my-5">
            <p>Don't have an account? <a href="/register">Sign up now!</a></p>
        </div>
    </form>
    <!-- ./ form -->

</div>

<!-- Bundle -->
<script src="dist/vendor/bundle.js"></script>

<!-- Landing page scripts -->
<script src="./dist/js/landing-page.min.js"></script>
</body>
</html>
