<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Donasi</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/donasidetail.css">
</head>
<body>

    <div class="container">
        <div class="back-arrow">
            <img src="/images/Left arrow button.png" alt="left arrow" onclick="window.location.href='{{ url('/supermarket/donasi') }}'">
        </div>

        <h1 class="section-title">Donasi Makanan</h1>

        <div class="address-box">
            <div class="address-header">
                <p>Alamat pengantaran</p>
                <img src="/images/editicon.png" alt="editicon">
            </div>
            <div class="address-content">
                <img src="/images/locicon.png" alt="locicon">
                <p>{{ $product->supermarket_address }}</p> <!-- Menampilkan alamat produk -->
            </div>
        </div>

        <div class="card">
            <p>Pilih lembaga sosial</p>
            <div class="payment-option">
                <label for="credit-debit">lembaga Sosial A</label>
                <input type="radio" name="payment-method" id="credit-debit" value="Kartu kredit atau debit">
            </div>
            <div class="payment-option">
                <label for="dana">lembaga Sosial B</label>
                <input type="radio" name="payment-method" id="dana" value="Dana">
            </div>
            <div class="payment-option">
                <label for="gopay">lembaga Sosial C</label>
                <input type="radio" name="payment-method" id="gopay" value="Gopay">
            </div>
            <div class="payment-option">
                <label for="ovo">lembaga Sosial D</label>
                <input type="radio" name="payment-method" id="ovo" value="Ovo">
            </div>
            <div class="payment-option">
                <label for="shopeepay">lembaga Sosial E</label>
                <input type="radio" name="payment-method" id="shopeepay" value="Shopee Pay">
            </div>
            <div class="payment-option">
                <label for="cash">lembaga Sosial F</label>
                <input type="radio" name="payment-method" id="cash" value="Tunai" checked>
            </div>
        </div>

        <div class="product">
            <div class="product-card">
                <div class="product-image">
                    <img src="{{ asset('storage/' . $product->product_image) }}" alt="{{ $product->product_name }}">
                </div>
                <div class="product-info">
                    <p class="product-title">{{ $product->product_name }}</p>
                    <p class="old-price">Rp{{ number_format($product->price, 0, ',', '.') }}</p>
                    <p class="new-price">Rp{{ number_format($product->discount_price ?? $product->price, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>

        <form action="{{ route('donation.delete', $product->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="confirm-button">Donasikan</button>
        </form>
    </div>
</body>
</html>
