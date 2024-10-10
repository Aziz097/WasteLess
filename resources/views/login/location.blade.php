<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>homepage</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/location.css">
</head>
<body>
        <div class="logo">
            <img src="/images/Logo wasteless.png" alt="logo">
        </div>
        <div class="image-loc">
            <img src="/images/loc.png" alt="loc" class="loc-image">
        </div>
        <div class="button-loc">
            <button class="loc-button" onclick="window.location.href='{{ url('/home') }}'">Aktifkan lokasi</button>
        </div>
</body>
</html>
