<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WasteLess-Sign in</title>
    <link href="{{ asset('css/signin.css') }}" rel="stylesheet">
</head>
<body>
    <div class="login-container">
        <form class="login-form" method="POST" action="">
            @csrf
            <h2>Log In</h2>
            
            <div class="input-container">
                <input type="text" name="phone" placeholder="phone number" required>
            </div>

            <div class="input-container">
                <input type="password" name="password" placeholder="password" required>
            </div>

            <div class="forgot-password">
                <a href="">forgot password?</a>
            </div>

            <button type="submit" class="login-btn">Log In</button>

            <div class="sign-up">
                Don’t have an account? <a onclick="window.location.href='{{ url('/signup') }}';">Sign Up</a>
            </div>
        </form>
    </div>
    <script src="{{ asset('') }}"></script>
</body>
</html>