<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Sebagai Customer</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/signupcustomer.css">
</head>
<body>
    <div class="container">
        <div class="back-arrow">
            <img src="/images/Left arrow button.png" alt="back arrow" onclick="window.location.href='{{ route('register') }}'">
        </div>
        <h1>Daftar Sebagai Customer</h1>
        <div class="form-container">
            <form id="registrationForm" action="{{ route('register.customer.post') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nama Lengkap</label>
                    <input type="text" id="name" name="name" placeholder="Masukkan nama lengkap" value="{{ old('name') }}" required>
                    @if ($errors->has('name'))
                        <span class="error-message">{{ $errors->first('name') }}</span>
                    @endif
                </div>
    
                <div class="form-group">
                    <label for="phone">Nomor HP</label>
                    <input type="text" id="phone" name="phone" placeholder="Masukkan nomor HP" value="{{ old('phone') }}" required>
                    @if ($errors->has('phone'))
                        <span class="error-message">{{ $errors->first('phone') }}</span>
                    @endif
                </div>
    
                <div class="form-group password-group">
                    <label for="password">Kata Sandi</label>
                    <input type="password" id="password" name="password" placeholder="Masukkan kata sandi" required>
                    <span class="toggle-password" onclick="togglePasswordVisibility('password')">&#128065;</span>
                    @if ($errors->has('password'))
                        <span class="error-message">{{ $errors->first('password') }}</span>
                    @endif
                </div>
    
                <div class="form-group password-group">
                    <label for="confirmPassword">Konfirmasi Kata Sandi</label>
                    <input type="password" id="confirmPassword" name="password_confirmation" placeholder="Masukkan ulang kata sandi" required>
                    <span class="toggle-password" onclick="togglePasswordVisibility('confirmPassword')">&#128065;</span>
                </div>
    
                <div class="form-group terms">
                    <input type="checkbox" id="terms" name="terms" required>
                    <label for="terms">Saya menyetujui <a href="#">Ketentuan layanan</a> dan <a href="#">Kebijakan privasi</a>.</label>
                </div>
    
                <div class="form-group">
                    <button type="submit" id="submitButton">Lanjut</button>
                </div>
            </form>
        </div>
    </div>
    <div class="footer">
        <img src="/images/wastelesslogomini.png" alt="WasteLess Logo" class="logo">
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('registrationForm');
            const submitButton = document.getElementById('submitButton');
            const termsCheckbox = document.getElementById('terms');
            
            termsCheckbox.addEventListener('change', function () {
                submitButton.disabled = !termsCheckbox.checked;
            });
        });

    function togglePasswordVisibility(id) {
        const passwordField = document.getElementById(id);
        const toggleIcon = passwordField.nextElementSibling;

        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            toggleIcon.innerHTML = '&#128065;'; // Change icon to 'eye-open'
        } else {
            passwordField.type = 'password';
            toggleIcon.innerHTML = '&#128065;'; // Change icon to 'eye-closed'
        }
    }
    </script>
</body>
</html>
