<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CommunicApp - Reset Password</title>

    <!-- Favicon -->
    <link rel="icon" href="./dist/media/img/favicon.png" type="image/png">

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:600,700&display=swap" rel="stylesheet">

    <!-- Material design icons -->
    <link href="{{asset('dist/icons/materialicons/css/materialdesignicons.min.css')}}" rel="stylesheet">

    <!-- Bundle Styles -->
    <link rel="stylesheet" href="{{asset('dist/vendor/bundle.css')}}')}}">

    <!-- Landing page styles -->
    <link rel="stylesheet" href="{{asset('dist/css/landing-page.min.css')}}">
</head>
<body class="auth" style="background: url({{asset('./img/chat.jpg')}})">

<div class="form-wrapper">

    <h1 class="hero-title" style="height: 20px; font-size : 30px;">
        <strong><a href="/" style="color : #000; text-decoration : none;">CommunicApp</a></strong>
    </h1>

    <h5>Reset password</h5>

    <!-- form -->
    <form method="POST" action="{{ route('send.email') }}">
        @csrf
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Email" name="email" style="outline: none;" required autofocus>
        </div>
        <button class="btn btn-primary">Submit</button>
        <div class="my-5">
            <p>Take a different action.</p>
            <a href="/register">Sign up now!</a>
            or
            <a href="/login">sign in now!</a>
        </div>
    </form>
    <!-- ./ form -->

</div>

<!-- Bundle -->
<script src="{{asset('dist/vendor/bundle.js')}}"></script>

<!-- Landing page scripts -->
<script src="{{asset('dist/js/landing-page.min.js')}}"></script>
</body>
</html>
