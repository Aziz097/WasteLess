<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesanan</title>
    <link rel="stylesheet" href="/css/detailorder.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="back-arrow">
            <img src="/images/Left arrow button.png" alt="back arrow" onclick="window.location.href='{{ url('/order/status') }}'">
        </div>
        <h1>Detail Pesanan</h1>
        <div class="order-details">
            <p><span>ID Pesanan</span> #12345678910</p>
            <p><span>Pengiriman</span> 27 Sept 2024, at 12:00 PM</p>
            <p><span>Total</span> Rp36.000</p>
        </div>
        <div class="items">
            <p>Item (2)</p>
        </div>

        <div class="product-card">
            <div class="discount-badge">-15%</div>
            <div class="product-image">
            <img src="/images/logowasteless.png" alt="Product Image">
            </div>
            <div class="product-info">
                <p class="product-title">Sari Roti Sobek Cokelat Sarikaya</p>
                <p class="old-price">Rp20.000</p>
                <p class="new-price">Rp17.000</p>
            </div>
            <div class="product-actions">
                <p>2</p>
            </div>
        </div>

        <div class="payment-shipping">
            <p><strong>Metode pembayaran</strong></p>
            <p class="payment-method">Tunai</p>

            <p><strong>Alamat Pengiriman</strong></p>
            <p class="address">
                Nama Penerima,<br>
                Jl. Terusan Ryacudu, Way Huwi, Kec. Jati Agung,<br>
                Kabupaten Lampung Selatan, Lampung 35365
            </p>
        </div>

        <div class="courier-card">
            <img src="/images/drivericon.png" alt="Courier Image">
            <div class="courier-info">
                <div class="courier-name">Nama Kurir</div>
                <div class="courier-phone">Nomor telepon kurir</div>
            </div>
        </div>

        <button class="button" onclick="window.location.href='{{ url('/home') }}'">Pesanan diterima</button>
        <button class="button">Laporkan Masalah</button>
    </div>
</body>
</html>
