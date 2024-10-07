<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donasi</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/donasi.css">
</head>
<body>
    <div class="container">
            <div class="icon">
                <img src="/images/Left arrow button.png" alt="User Icon" onclick="window.location.href='{{ url('/supermarket-home') }}'">
            </div>
            <div class="alert">
                <img src="/images/alerticon.png" alt="alert icon">
                <p><b>Produk hampir kadaluarsa!</b></p>
            </div>
            <div class="product">
                <div class="product-card">
                    <div class="product-image">
                    <img src="/images/logowasteless.png" alt="Product Image">
                    </div>
                    <div class="product-info">
                        <p class="product-title">Sari Roti Sobek Cokelat Sarikaya</p>
                        <p class="old-price">Rp20.000</p>
                        <p class="new-price">Rp17.000</p>
                    </div>
                    <div class="product-actions" onclick="window.location.href='{{ url('/supermarket/donasi/detail') }}'">
                        <p><b>DONASIKAN</b></p>
                    </div>
                </div>
            </div>
    </div>

</body>
</html>
