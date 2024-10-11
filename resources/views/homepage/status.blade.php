<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Periksa ulang</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/css/status.css">
</head>
<body>

    <div class="container">
        <div class="back-arrow">
            <img src="/images/Left arrow button.png" alt="left arrow" onclick="window.location.href='{{ url('/order') }}'">
        </div>

        <h1 class="section-title">Pesanan Anda</h1>

        <div class="order-card">
            <div class="order-header">
                <p><strong>Pesanan - #12345678910</strong></p>
                <p>Sari Roti Sobek dan 1 item lainnya</p>
            </div>
            <div class="order-status">
                <div class="circle completed"></div>
                <div class="line"></div>
                <div class="circle active"></div>
                <div class="line"></div>
                <div class="circle"></div>
                <div class="line"></div>
                <div class="circle"></div>
            </div>
            <p class="status-text">Diproses</p>
            <button class="detail-button" onclick="window.location.href='{{ url('/order/status/detail-order') }}'">Cek detail</button>
        </div>
        <br>
        <h3>Pesanan Selesai</h3>
        <br>
        <div class="order-card finished">
            <div class="order-header">
                <p><strong>Pesanan - #12345678999</strong></p>
                <p>21 Sept 2024, 3 items, 12:00 PM</p>
            </div>
            <div class="order-status finished-status">
                <img src="/images/okicon.png" alt="done">
                <p class="status-text finished-text">Selesai</p>
                <span class="arrow">></span>
            </div>
        </div>
    </div>
</body>
</html>
