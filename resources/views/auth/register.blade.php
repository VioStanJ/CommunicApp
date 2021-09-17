<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CommunicApp - Register</title>

    <!-- Favicon -->
    <link rel="icon" href="./dist/media/img/favicon.png" type="image/png">

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:600,700&display=swap" rel="stylesheet">

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

    <h5>Create account</h5>

    <!-- form -->
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Fullname">

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-mail">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Passsword">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Retype Password">
        </div>
        <button class="btn btn-primary" type="submit">Sign Up</button>
        <div class="my-5">
            Already have an account? <a href="/login">Sign in now!</a>
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
