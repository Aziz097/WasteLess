<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Donasi</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/css/donasisucces.css">
</head>
<body>

    <div class="container">
            <img src="/images/success.png" alt="succes icon">
            <h1>Terima kasih telah berdonasi!</h1>
            <p>Donasi Anda akan segera dijemput oleh lembaga sosial</p>
    </div>
        <button class="confirm-button" onclick="window.location.href='{{ url('/supermarket-home') }}'">Selesai</button>
</body>