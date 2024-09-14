<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WasteLess-Sign in</title>
    <link href="{{ asset('css/otp.css') }}" rel="stylesheet">
</head>
<body>
    <div class="login-container">
        <form class="login-form" method="POST" action="">
            @csrf
            <h2>OTP</h2>
            
            <div class="input-container">
                <input type="number" name="number" placeholder="OTP" required>
            </div>

            <button type="submit" class="login-btn">Log In</button>
        </form>
    </div>
    <script src="{{ asset('') }}"></script>
</body>
</html>