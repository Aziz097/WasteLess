<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WasteLess</title>
    <link href="{{ asset('css/signup.css') }}" rel="stylesheet">
</head>
<body>
    <div class="signup-container">
        <form class="signup-form">
            <h2>Sign Up</h2>
            <div class="input-group">
                <input type="text" placeholder="first name" name="first_name" required>
                <input type="text" placeholder="last name" name="last_name" required>
            </div>
            <div class="input-field">
                <input type="tel" placeholder="phone number" name="phone" required>
            </div>
            <div class="input-field">
                <input type="password" placeholder="create password" name="password" required>
            </div>
            <div class="input-field">
                <input type="password" placeholder="confirm password" name="confirm_password" required>
            </div>
            <button type="submit" class="signup-btn">Sign Up</button>
            <p class="login-link">Already have an account? <a onclick="window.location.href='{{ url('/signin') }}';">Log In</a></p>
        </form>
    </div>
    <script src="{{ asset('') }}"></script>
</body>
</html>
