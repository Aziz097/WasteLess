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

                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="product-detail">
                        <label>Nama Produk</label>
                        <input type="text" name="product_name" value="Sari Roti Sobek Cokelat Sarikaya" required>
                    </div>
    
                    <div class="product-detail">
                        <label>Deskripsi</label>
                        <textarea name="description" required>Roti lembut dengan isian lezat cokelat dan srikaya.</textarea>
                    </div>
        

                    <div class="product-detail">
                        <label>Tanggal Kadaluwarsa</label>
                        <input type="date" name="expiration_date" value="2024-09-30" required>
                    </div>
        
                    <div class="product-detail">
                        <label>Alamat Supermarket</label>
                        <textarea name="supermarket_address" required>Jl. Terusan Ryacudu, Way Huwi, Kec. Jati Agung, Kabupaten Lampung Selatan, Lampung 35365</textarea>
                    </div>
        
                    <div class="product-detail">
                        <label>Harga</label>
                        <input type="text" name="price" value="Rp17.000" required>
                    </div>
        
                    <div class="product-detail">
                        <label>Stok</label>
                        <input type="number" name="stock" value="10" min="0" required>
                    </div>
        
                    <div class="product-detail">
                        <label>Upload Gambar Produk</label>
                        <input type="file" name="product_image" accept="image/*" required>
                    </div>
        
                    <button type="submit" class="confirm-button">Tambah Produk</button>
                </form>
            </div>
    </div>

</body>
</html>
