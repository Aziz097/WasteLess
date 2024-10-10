<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/produkdetail.css">
</head>
<body>
    <div class="container-head" onclick="window.location.href='{{ url('/home') }}'">
        <img src="/images/backarrow.png" alt="backarrow">
        <h1>Detail Produk</h1>

        <div class="product-image-container">
            <img src="{{ asset('storage/' . $product->product_image) }}" alt="{{ $product->product_name }}" class="product-image">
        </div>

        <div class="product-details">
            <h2>{{ $product->product_name }}</h2>
            <p>{{ $product->description }}</p>
            <p><strong>Harga:</strong> Rp{{ number_format($product->price, 0, ',', '.') }}</p>
            <p><strong>Stok:</strong> {{ $product->stock }} pcs</p>
            <p><strong>Alamat:</strong> {{ $product->supermarket_address }}</p>
        </div>
    </div>

    <!-- Form untuk menambahkan produk ke keranjang -->
    <form action="{{ route('cart.add') }}" method="POST" class="add-to-cart-form">
        @csrf
        <input type="hidden" name="id" value="{{ $product->id }}">
        <input type="hidden" name="product_name" value="{{ $product->product_name }}">
        <input type="hidden" name="price" value="{{ $product->price }}">
    
        <div>
            <label>Jumlah:</label>
            <input type="number" name="quantity" value="1" min="1" required>
        </div>
        <button type="submit" class="button">Tambahkan ke Keranjang</button>
    </form>

</body>
</html>
