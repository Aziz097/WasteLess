<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donasi</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/produk.css">
</head>
<body>
    <div class="container">
        <div class="icon">
            <img src="/images/Left arrow button.png" alt="Back Button" onclick="window.location.href='{{ url('/supermarket-home') }}'">
        </div>

        <div class="pagination-links">
            <nav>
                <ul class="pagination">
                    <!-- Tombol Previous -->
                    @if ($products->onFirstPage())
                        <li class="page-item disabled"><span class="page-link">Previous</span></li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $products->previousPageUrl() }}" rel="prev">Previous</a>
                        </li>
                    @endif
        
                    <!-- Halaman -->
                    @foreach ($products->links()->elements[0] as $page => $url)
                        @if ($page == $products->currentPage())
                            <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
        
                    <!-- Tombol Next -->
                    @if ($products->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $products->nextPageUrl() }}" rel="next">Next</a>
                        </li>
                    @else
                        <li class="page-item disabled"><span class="page-link">Next</span></li>
                    @endif
                </ul>
            </nav>
        </div>

        @foreach($products as $product)
            <div class="product-card">
                <div class="product-image">
                    <img src="{{ asset('storage/' . $product->product_image) }}" alt="{{ $product->product_name }}">
                </div>
                <div class="product-info">
                    <p class="product-title">{{ $product->product_name }}</p>
                    <p class="old-price">Rp{{ number_format($product->price, 0, ',', '.') }}</p>
                    <p class="new-price">Rp{{ number_format($product->discount_price ?? $product->price, 0, ',', '.') }}</p>
                </div>
                <div class="product-actions">
                    <form action="{{ url('/products/' . $product->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="add-button"><b>HAPUS</b></button>
                    </form>
                </div>
            </div>
        @endforeach

        <button class="confirm-button" onclick="window.location.href='{{ url('/supermarket/tambah-produk') }}'">Tambah Produk</button>


         
    </div>
</body>
</html>
