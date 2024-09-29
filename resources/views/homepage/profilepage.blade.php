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
                <i class="fas fa-user-circle"></i>
            </div>
            <div class="profile-info">
                <div class="name">Nama Akun</div>
                <div class="phone">No. Telepon</div>
            </div>
        </div>
        
        <div class="menu-section">
            <h3>Menu Profile</h3>
            <ul>
                <li><i class="fas fa-history"></i> Riwayat Pembelian</li>
                <li><i class="fas fa-question-circle"></i> FAQ</li>
            </ul>
        </div>
        
        <div class="menu-section">
            <h3>Pengaturan</h3>
            <ul>
                <li><i class="fas fa-key"></i> Ubah Kata Sandi</li>
                <li><i class="fas fa-bell"></i> Pengaturan Notifikasi</li>
            </ul>
        </div>
        
        <div class="menu-section">
            <ul>
                <li><i class="fas fa-info-circle"></i> Tentang Aplikasi</li>
                <li><i class="fas fa-sign-out-alt"></i> Log Out</li>
            </ul>
        </div>
    </div>

    <div class="bottom-nav">
        <button class="nav-item" onclick="window.location.href='{{ url('/homepage') }}'"><img src="images/homeicon.png" alt="Home" /></button>
        <button class="nav-item" onclick="window.location.href='{{ url('/order') }}'"><img src="images/ordericon.png" alt="Cart" /></button>
        <button class="nav-item active" onclick="window.location.href='{{ url('/profile') }}'"><img src="images/profileicon.png" alt="Profile" /></button>
    </div>
</body>
</html>
