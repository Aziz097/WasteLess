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
            <img src="/images/Left arrow button.png" alt="Back Button" onclick="window.location.href='{{ url('/supermarket-home') }}'">
        </div>

        <div class="alert">
            <img src="/images/alerticon.png" alt="Alert Icon">
            <p><b>Produk hampir kadaluarsa!</b></p>
        </div>

        @foreach($almostExpiredProducts as $product)
            <div class="product-card">
                <div class="product-image">
                    <img src="{{ asset('storage/' . $product->product_image) }}" alt="{{ $product->product_name }}">
                </div>
                <div class="product-info">
                    <p class="product-title">{{ $product->product_name }}</p>
                    <p class="old-price">Rp{{ number_format($product->price, 0, ',', '.') }}</p>
                    <p class="new-price">Rp{{ number_format($product->discount_price ?? $product->price, 0, ',', '.') }}</p>
                </div>
                <div class="product-actions" onclick="window.location.href='{{ url('/supermarket/donasi/detail/' . $product->id) }}'">
                    <p class="donasi-button"><b>DONASIKAN</b></p>
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>
