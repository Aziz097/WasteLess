<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>homepage</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/userhomepage.css">
    <script src="js/userhomepage.js" defer></script>
</head>
<body>
    <div class="container-filter">
        <div class="search-bar">
            <input type="text" placeholder="Cari produk..." id="search" />
            <button type="button" class="search-btn">
                <img src="images/searchicon.png" alt="Search" />
            </button>
        </div>

        <div class="filter-bar">
            <button class="filter-btn">Terdekat</button>
            <button class="filter-btn">Termurah</button>
            <button class="filter-btn">Terlaris</button>
        </div>
        <div class="product-card">
            <div class="discount-badge">-15%</div>
            <div class="product-image">
            <img src="images/logowasteless.png" alt="Product Image">
            </div>
            <div class="product-info">
                <p class="product-title">Sari Roti Sobek Cokelat Sarikaya</p>
                <p class="old-price">Rp20.000</p>
                <p class="new-price">Rp17.000</p>
            </div>
            <div class="product-actions">
                <button class="add-button">+</button>
            </div>
        </div>
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
