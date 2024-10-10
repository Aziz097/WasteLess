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

        @foreach($cartItems as $item)
        <div class="product-card">
            <div class="product-info">
                <p class="product-title">{{ $item->product_name }}</p>
                <p class="new-price">Rp{{ number_format($item->price, 0, ',', '.') }}</p>
            </div>
            <div class="product-actions">
                <p>{{ $item->quantity }}</p>
            </div>
        </div>
        @endforeach

        <div class="card">
            <h2>Ringkasan Pembayaran</h2>
            <div class="row">
                <span>Subtotal produk</span>
                <span class="price">Rp{{ number_format($subtotal, 0, ',', '.') }}</span>
            </div>
            <div class="row">
                <span class="discount">Diskon</span>
                <span class="price discount">15%</span>
            </div>
            <div class="row">
                <span>Biaya aplikasi</span>
                <span class="price">Rp1.000</span>
            </div>
            <hr>
            <div class="row total">
                <span>Total pembayaran</span>
                <span class="price total">Rp{{ number_format($subtotal - ($subtotal * 0.15) + 1000, 0, ',', '.') }}</span>
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

            <button class="confirm-button" onclick="window.location.href='{{ url('/cart/clear') }}'">Selesaikan pesanan</button>
    </div>

</body>
</html>
