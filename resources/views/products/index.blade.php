<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px; /* Jarak antar kontainer */
        }
        .product-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            width: 200px; /* Lebar kontainer produk */
            text-align: center;
        }
        img {
            width: 100%; /* Gambar menyesuaikan dengan lebar kontainer */
            height: auto;
            border-radius: 8px; /* Sudut gambar melingkar */
        }
        button {
            background-color: #007BFF; /* Warna latar belakang tombol */
            color: white; /* Warna teks tombol */
            border: none; /* Tanpa border */
            padding: 5px 10px; /* Jarak dalam tombol */
            border-radius: 5px; /* Sudut melingkar tombol */
            cursor: pointer; /* Tanda kursor saat hover */
            margin: 5px; /* Jarak antar tombol */
        }
        button:hover {
            background-color: #0056b3; /* Warna tombol saat hover */
        }
    </style>
</head>
<body>

<h2>Daftar Produk</h2>

@if (session('success'))
    <div style="color: green;">
        {{ session('success') }}
    </div>
@endif

<a href="{{ route('products.create') }}" style="display: inline-block; margin-bottom: 15px;">Tambah Produk</a>

<div class="container">
    @foreach ($products as $product)
        <div class="product-card">
            @if ($product->images->count() > 0)
                <!-- Tampilkan gambar pertama sebagai ikon -->
                <img src="{{ asset('storage/' . $product->images->sortBy('id')->first()->image_path) }}" alt="Gambar Produk">
            @else
                <img src="{{ asset('placeholder.jpg') }}" alt="Gambar Tidak Tersedia"> <!-- Placeholder jika tidak ada gambar -->
            @endif
            <h3>{{ $product->nama_produk }}</h3>
            <p>Harga: Rp{{ number_format($product->harga, 2, ',', '.') }}</p>
            <p>Stok: {{ $product->stok }}</p>
            <div>
                <!-- Tombol Edit -->
                <a href="{{ route('products.edit', $product->id) }}">
                    <button>Edit</button>
                </a>

                <!-- Form untuk arsipkan produk -->
                <form action="{{ route('products.archive', $product->id) }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" onclick="return confirm('Yakin ingin mengarsipkan produk ini?')">Arsipkan</button>
                </form>

                <!-- Form untuk hapus produk -->
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin ingin menghapus produk ini?')">Hapus</button>
                </form>
            </div>
        </div>
    @endforeach
</div>

<div>{{ $products->links() }}</div>

</body>
</html>
