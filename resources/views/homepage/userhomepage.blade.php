<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>homepage</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/userhomepage.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="js/userhomepage.js" defer></script>
</head>
<body>
    <div class="container-filter">
        <form action="{{ url('/home') }}" method="GET">
        <div class="search-bar">
                <input type="text" name="search" placeholder="Cari produk..." id="search" value="{{ request('search') }}" />
                <button type="submit" class="search-btn">
                    <img src="images/searchicon.png" alt="Search" />
                </button>
            </div>
        </form>

        <div class="filter-bar">
            <a href="{{ url('/home?filter=terdekat') }}">
                <button class="filter-btn {{ request('filter') == 'terdekat' ? 'active' : '' }}">Terdekat</button>
            </a>
            <a href="{{ url('/home?filter=termurah') }}">
                <button class="filter-btn {{ request('filter') == 'termurah' ? 'active' : '' }}">Termurah</button>
            </a>
            <a href="{{ url('/home?filter=terlaris') }}">
                <button class="filter-btn {{ request('filter') == 'terlaris' ? 'active' : '' }}">Terlaris</button>
            </a>
        </div>

                <!-- Link pagination -->
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

        <!-- Tampilkan produk dengan pagination -->
        @foreach($products as $product)
        <div class="product-card">
            <div class="discount-badge">-15%</div>
            <div class="product-image">
                <img src="{{ asset('storage/' . $product->product_image) }}" alt="Product Image">
            </div>
            <div class="product-info">
                <p class="product-title">{{ $product->product_name }}</p>
                <p class="old-price">Rp{{ number_format($product->price , 0, ',', '.') }}</p>
                <p class="new-price">Rp{{ number_format($product->price - ($product->price * 0.15), 0, ',', '.') }}</p>
            </div>
            <div class="product-actions">
                <!-- Tambahkan link ke halaman detail produk -->
                <a href="{{ url('/product/' . $product->id) }}">
                    <button class="add-button">+</button>
                </a>
            </div>
        </div>
        @endforeach
    </div>

    <div id="cart-summary">
        <span id="item-count">0 item</span>
        <span id="total-price">Rp0</span>
        <img src="images/carticon.png" alt="Cart Icon">
    </div>

    <div class="bottom-nav">
        <button class="nav-item active" onclick="window.location.href='{{ url('/home') }}'"><img src="images/homeicon.png" alt="Home" /></button>
        <button class="nav-item" onclick="window.location.href='{{ url('/order') }}'"><img src="images/ordericon.png" alt="Cart" /></button>
        <button class="nav-item" onclick="window.location.href='{{ url('/profile') }}'"><img src="images/profileicon.png" alt="Profile" /></button>
    </div>
</body>
</html>
