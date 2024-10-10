<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donasi</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/addproduk.css">
</head>
<body>
    <div class="container">
        <div class="icon">
            <img src="/images/Left arrow button.png" alt="User Icon" onclick="window.location.href='{{ url('/supermarket-home') }}'">
        </div>
        <h1 class="section-title">Tambahkan Produk</h1>

        <div class="product-container">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <!-- Nama Produk -->
                <div class="product-detail">
                    <label for="product_name">Nama Produk</label>
                    <input type="text" id="product_name" name="product_name" value="{{ old('product_name') }}" required>
                    @error('product_name')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Deskripsi -->
                <div class="product-detail">
                    <label for="description">Deskripsi</label>
                    <textarea id="description" name="description" required>{{ old('description') }}</textarea>
                    @error('description')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Tanggal Kadaluwarsa -->
                <div class="product-detail">
                    <label for="expiration_date">Tanggal Kadaluwarsa</label>
                    <input type="date" id="expiration_date" name="expiration_date" value="{{ old('expiration_date') }}" required>
                    @error('expiration_date')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Alamat Supermarket -->
                <div class="product-detail">
                    <label for="supermarket_address">Alamat Supermarket</label>
                    <textarea id="supermarket_address" name="supermarket_address" required>{{ old('supermarket_address') }}</textarea>
                    @error('supermarket_address')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Harga -->
                <div class="product-detail">
                    <label for="price">Harga</label>
                    <input type="text" id="price" name="price" value="{{ old('price') }}" required>
                    @error('price')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Stok -->
                <div class="product-detail">
                    <label for="stock">Stok</label>
                    <input type="number" id="stock" name="stock" value="{{ old('stock') }}" required>
                    @error('stock')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Upload Gambar Produk -->
                <div class="product-detail">
                    <label for="product_image">Upload Gambar Produk</label>
                    <input type="file" id="product_image" name="product_image" accept="image/*" required>
                    @error('product_image')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit" class="confirm-button">Tambah Produk</button>
            </form>
        </div>
    </div>

</body>
</html>
