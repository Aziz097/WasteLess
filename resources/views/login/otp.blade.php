<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi OTP</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/otp.css">
</head>
<body>
    <div class="verification-container">
        <img src="images\Left arrow button.png" alt="arrow">
        <h1>Verifikasi</h1>
        <p>Masukan Kode OTP</p>
        <div class="otp-input-container">
        <div class="otp-single-input-container">
            <input type="text" maxlength="6" class="otp-single-line" placeholder="------" oninput="formatOTP(this)">
        </div>
        </div>
        <button class="submit-btn">Masuk</button>
        <p class="terms">
            Saya menyetujui <a href="#">Ketentuan layanan</a> dan <a href="#">Kebijakan privasi</a> WasteLess.
        </p>
        <div class="brand-logo">
            <img src="images\WasteLesslogo.png" alt="WasteLess Logo">
        </div>
    </div>
</body>
</html>
