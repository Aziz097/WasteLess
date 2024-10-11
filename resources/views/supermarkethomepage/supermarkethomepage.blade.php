<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supermarket Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/supermarkethomepage.css">
</head>
<body>
    <div class="container">
        <div class="profile">
            <div class="content">
                <p>Hello, <br><b>{{ $supermarket->name }}</b></p>
            </div>
            <div class="icon">
                <img src="/images/avataricon.png" alt="User Icon">
            </div>
        </div>
        <div class="container-green">
            <div class="text">
                <p>Jual dengan bijak, <br>Lindungi Lingkungan</p>
            </div>
            <div class="icon-green">
                <img src="/images/icongreen.png" alt="Environment Icon">
            </div>
        </div>

        <div class="icon-grid">
            <div class="grid-item" onclick="window.location.href='{{ url('/supermarket/donasi') }}'">
                <img src="/images/donasiicon.png" alt="Donasi Icon">
                <p>Donasi</p>
            </div>
            <div class="grid-item">
                <img src="/images/produkicon.png" alt="Produk Icon">
                <p onclick="window.location.href='{{ url('/supermarket/produk') }}'">Produk</p>
            </div>
            <div class="grid-item">
                <img src="/images/pesananicon.png" alt="Pesanan Icon">
                <p>Pesanan</p>
            </div>
            <div class="grid-item">
                <img src="/images/dikirimicon.png" alt="Dikirim Icon">
                <p>Dikirim</p>
            </div>
        </div>
    </div>
</body>
</html>
