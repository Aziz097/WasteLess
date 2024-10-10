<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Anda</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/orderpage.css">
</head>
<body>
    <div class="container-head">
        <img src="images/backarrow.png" alt="backarrow" onclick="window.location.href='{{ url('/home') }}'">
        <h1>Keranjang Anda</h1>
        <div class="product-cards-container">
            @foreach ($cartItems as $item)
            <div class="product-card">
                <div class="product-info">
                    <p class="product-title">{{ $item->product_name }}</p>
                    <p class="new-price">Rp{{ number_format($item->price, 0, ',', '.') }}</p>
                    <p class="quantity">Quantity: {{ $item->quantity }}</p>
                </div>
                <div class="product-actions">
                    <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="remove-button">-</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>



    <div class="cart-container">
        <div class="subtotal-section">
            <span>Subtotal</span>
            <span class="subtotal-amount">Rp{{ number_format($subtotal, 0, ',', '.') }}</span>
        </div>
        <button class="checkout-button" onclick="window.location.href='{{ url('/order/checkout') }}'">Check out</button>
    </div>

    <div class="bottom-nav">
        <button class="nav-item" onclick="window.location.href='{{ url('/home') }}'">
            <img src="images/homeicon.png" alt="Home" />
        </button>
        <button class="nav-item active" onclick="window.location.href='{{ url('/order') }}'">
            <img src="images/ordericon.png" alt="Cart" />
        </button>
        <button class="nav-item" onclick="window.location.href='{{ url('/profile') }}'">
            <img src="images/profileicon.png" alt="Profile" />
        </button>
    </div>
</body>

</html>
