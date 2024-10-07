<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi OTP</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/otp.css">
</head>
<body>
    <div class="verification-container">
        <img src="/images/Left arrow button.png" alt="arrow" onclick="window.location.href='{{ url('/signin') }}'">
        <h1>Verifikasi</h1>
        <p>Masukan Kode OTP</p>
        <div class="otp-input-container">
        <div class="otp-single-input-container">
            <input type="text" maxlength="6" class="otp-single-line" oninput="formatOTP(this)" style="padding:10px 100px; border-radius:50px; border-color:#00c853; text-align:center;">
        </div>
        </div>
        <button class="submit-btn" onclick="window.location.href='{{ url('/signin/location') }}'">Masuk</button>
        <p class="terms">
            Saya menyetujui <a href="#">Ketentuan layanan</a> dan <a href="#">Kebijakan privasi</a> WasteLess.
        </p>
    </div>
    <div class="brand-logo">
        <img src="/images/WasteLesslogomini.png" alt="WasteLess Logo">
    </div>
</body>
</html>
