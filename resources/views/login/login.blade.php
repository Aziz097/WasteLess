<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="login-container">
    <img src="images\Left arrow button.png" alt="arrow">
        <h1>Masuk</h1>
        <form>
            <div class="input-field">
                <label for="phone">Nomor HP</label>
                <input type="text" id="phone" placeholder="Masukkan nomor HP" required>
            </div>
            <div class="input-field">
                <label for="password">Kata Sandi</label>
                <input type="password" id="password" placeholder="Masukkan kata sandi" required>
                <button type="button" class="toggle-password">
                    <img src="https://img.icons8.com/material-outlined/24/000000/visible.png" class="eye-open" alt="Mata Terbuka" />
                    <img src="https://img.icons8.com/material-outlined/24/000000/invisible.png" class="eye-closed" alt="Mata Tertutup" style="display:none;" />
                </button>
            </div>
            <button type="submit" class="submit-btn">Lanjut</button>
        </form>
        <p class="terms">
            Saya menyetujui <a href="#">Ketentuan layanan</a> dan <a href="#">Kebijakan privasi</a> WasteLess.
        </p>
        <div class="brand-logo">
            <img src="images\WasteLesslogo.png" alt="WasteLess">
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        const togglePassword = document.querySelector('.toggle-password');
        const passwordInput = document.querySelector('#password');
        const eyeOpen = document.querySelector('.eye-open');
        const eyeClosed = document.querySelector('.eye-closed');

        togglePassword.addEventListener('click', function () {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);

            if (type === 'text') {
                eyeOpen.style.display = 'none';
                eyeClosed.style.display = 'inline';
            } else {
                eyeOpen.style.display = 'inline';
                eyeClosed.style.display = 'none';
            }
        });
    </script>
</body>
</html>
