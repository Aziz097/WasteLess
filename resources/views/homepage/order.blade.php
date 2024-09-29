<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/orderpage.css">
    <script src="js/orderpage.js"></script>
</head>
<body>
    <div class="container-head" onclick="window.location.href='{{ url('/homepage') }}'">
        <img src="images/backarrow.png" alt="backarrow">
        <h1>Keranjang Anda</h1>
    </div>

    <div class="product-card">
        <div class="discount-badge">-15%</div>
        <div class="product-image">
        <img src="images/logowasteless.png" alt="Product Image" onclick="window.location.href='{{ url('/') }}'">
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

    <div class="cart-container">
        <div class="subtotal-section">
            <span>Subtotal</span>
            <span class="subtotal-amount">Rp<span id="subtotal">51.000</span></span>
        </div>
        <button class="checkout-button">Check out</button>
    </div>
    
    <div class="order-summary-container">
        <h1>Your Order</h1>
        <div id="order-items"></div>
    </div>

    <div class="bottom-nav">
        <button class="nav-item" onclick="window.location.href='{{ url('/homepage') }}'"><img src="images/homeicon.png" alt="Home" /></button>
        <button class="nav-item active" onclick="window.location.href='{{ url('/order') }}'"><img src="images/ordericon.png" alt="Cart" /></button>
        <button class="nav-item" onclick="window.location.href='{{ url('/profile') }}'"><img src="images/profileicon.png" alt="Profile" /></button>
    </div>
</body>
</html>
