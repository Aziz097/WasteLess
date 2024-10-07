<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/profilepage.css">
</head>
<body>
    <div class="profile-menu">
        <div class="profile-header">
            <div class="profile-icon">
                <img src="images/iconprofile.png" alt="iconprofile">
            </div>
            <div class="profile-info">
                <div class="name">{{ $customer->name }}</div>
                <div class="phone">{{ $customer->phone }}</div>
            </div>
        </div>
        
        <div class="menu-section">
            <h3>Menu Profile</h3>
            <ul>
                <li onclick="window.location.href='{{ url('/order/status') }}'"><img src="images/historyicon.png" alt="history icon">
                    <i class="fas fa-history"></i> Riwayat Pembelian
                </li>
                <li><img src="images/faqicon.png" alt="faq icon">
                    <i class="fas fa-question-circle"></i> FAQ
                </li>
            </ul>
        </div>
        
        <div class="menu-section">
            <h3>Pengaturan</h3>
            <ul>
                <li><img src="images/changepasswordicon.png" alt="change password icon">
                    <i class="fas fa-key"></i> Ubah Kata Sandi</li>
                <li><img src="images/settingicon.png" alt="faq icon">
                    <i class="fas fa-bell"></i> Pengaturan Notifikasi</li>
            </ul>
        </div>
        
        <div class="menu-section">
            <ul>
                <li><img src="images/abouticon.png" alt="about icon">
                    <i class="fas fa-info-circle"></i> Tentang Aplikasi</li>
                <li><img src="images/logouticon.png" alt="logout icon">
                    <i class="fas fa-sign-out-alt"></i> <a href="{{ route('logout') }}" 
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </ul>
        </div>
    </div>

    <div class="bottom-nav">
        <button class="nav-item" onclick="window.location.href='{{ url('/home') }}'"><img src="images/homeicon.png" alt="Home" /></button>
        <button class="nav-item" onclick="window.location.href='{{ url('/order') }}'"><img src="images/ordericon.png" alt="Cart" /></button>
        <button class="nav-item active" onclick="window.location.href='{{ url('/profile') }}'"><img src="images/profileicon.png" alt="Profile" /></button>
    </div>
</body>
</html>
