<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WasteLess</title>
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="{{ asset('images/logowasteless.png') }}" alt="WasteLess Logo" class="logo-img">
        </div>
        <div class="title">
        </div>
        <div class="buttons">
            <button class="login-btn" onclick="window.location.href='{{ url('/signin') }}';">Log In</button>
            <button class="signup-btn" onclick="window.location.href='{{ url('/signup') }}';">Sign Up</button>
        </div>
    </div>
    <script src="{{ asset('') }}"></script>
</body>
</html>
