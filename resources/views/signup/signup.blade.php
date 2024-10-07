<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Sebagai</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/signup.css">
</head>
<body>
    <div class="container">
        <div class="back-arrow">
            <img src="/images/Left arrow button.png" alt="back arrow" onclick="window.location.href='{{ url('/') }}'">
        </div>
        <h1>Daftar Sebagai</h1>
        <div class="account-selection">
            <h2>Pilih jenis akun Anda untuk melanjutkan</h2>
            <div class="options">
                <div class="option">
                    <img src="/images/iconsupermarket.png" alt="icon supermarket">
                    <button onclick="window.location.href='{{ url('/signup/supermarket') }}'">Supermarket</button>
                </div>
                <div class="option">
                    <img src="/images/iconcustomer.png" alt="icon customer">
                    <button onclick="window.location.href='{{ url('/signup/customer') }}'">Customer</button>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <img src="/images/wastelesslogomini.png" alt="WasteLess Logo" class="logo">
    </div>
</body>
</html>
