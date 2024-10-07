<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>checkout</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/css/checkout.css">
</head>
<body>

    <div class="container">
        <div class="back-arrow">
            <img src="/images/Left arrow button.png" alt="left arrow" onclick="window.location.href='{{ url('/order') }}'">
        </div>

        <h1 class="section-title">Periksa ulang</h1>

        <div class="address-box">
            <div class="address-header">
                <p>Alamat pengantaran</p>
                <img src="/images/editicon.png" alt="editicon">
            </div>
            <div class="address-content">
                <img src="/images/locicon.png" alt="locicon">
                <p>Jl. Terusan Ryacudu, Way Huwi, Kec. Jati Agung, Kabupaten Lampung Selatan, Lampung 35365</p>
            </div>
        </div>

        <div class="delivery-box">
            <p class="delivery-title">Pilih Pengiriman</p>
            <label class="delivery-option">
                <span>Antar ke tempat saya</span>
                <input type="radio" name="delivery" value="antar">
                <span class="checkmark"></span>
            </label>
            <hr>
            <label class="delivery-option">
                <span>Ambil di supermarket</span>
                <input type="radio" name="delivery" value="ambil" checked>
                <span class="checkmark"></span>
            </label>
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

        <div class="card">
            <h2>Ringkasan Pembayaran</h2>
            <div class="row">
                <span>Subtotal produk</span>
                <span class="price">Rp20.000</span>
            </div>
            <div class="row">
                <span class="discount">Diskon</span>
                <span class="price discount">Rp-3.000</span>
            </div>
            <div class="row">
                <span>Biaya aplikasi</span>
                <span class="price">Rp1.000</span>
            </div>
            <hr>
            <div class="row total">
                <span>Total pembayaran</span>
                <span class="price total">Rp18.000</span>
            </div>
        </div>

        <div class="card">
            <h2>Payment Method</h2>
            <div class="payment-option">
                <img src="/images/debiticon.png" alt="Card Icon">
                <label for="credit-debit">Kartu kredit atau debit</label>
                <input type="radio" name="payment-method" id="credit-debit" value="Kartu kredit atau debit">
            </div>
            <div class="payment-option">
                <img src="/images/danaicon.png" alt="Dana Icon">
                <label for="dana">Dana</label>
                <input type="radio" name="payment-method" id="dana" value="Dana">
            </div>
            <div class="payment-option">
                <img src="/images/gopayicon.png" alt="Gopay Icon">
                <label for="gopay">Gopay</label>
                <input type="radio" name="payment-method" id="gopay" value="Gopay">
            </div>
            <div class="payment-option">
                <img src="/images/ovoicon.png" alt="Ovo Icon">
                <label for="ovo">Ovo</label>
                <input type="radio" name="payment-method" id="ovo" value="Ovo">
            </div>
            <div class="payment-option">
                <img src="/images/shopeeicon.png" alt="Shopee Pay Icon">
                <label for="shopeepay">Shopee Pay</label>
                <input type="radio" name="payment-method" id="shopeepay" value="Shopee Pay">
            </div>
            <div class="payment-option">
                <img src="/images/tunaiicon.png" alt="Tunai Icon">
                <label for="cash">Tunai</label>
                <input type="radio" name="payment-method" id="cash" value="Tunai" checked>
            </div>
        </div>

            <button class="confirm-button" onclick="window.location.href='{{ url('/order') }}'">Selesaikan pesanan</button>
    </div>

</body>
</html>
