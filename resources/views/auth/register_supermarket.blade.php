<!-- resources/views/auth/register_supermarket.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Supermarket</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Registrasi Supermarket</h1>
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ url('/register/supermarket') }}" method="POST">
            @csrf
            <div>
                <label for="name">Nama Supermarket:</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div>
                <label for="phone">Nomor HP:</label>
                <input type="text" name="phone" id="phone" required>
            </div>
            <div>
                <label for="password">Kata Sandi:</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div>
                <label for="password_confirmation">Konfirmasi Kata Sandi:</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required>
            </div>
            <div>
                <label for="npwp">NPWP:</label>
                <input type="text" name="npwp" id="npwp" required>
            </div>
            <div>
                <label for="address">Alamat Supermarket:</label>
                <input type="text" name="address" id="address" required>
            </div>
            <button type="submit">Daftar</button>
        </form>
    </div>
</body>
</html>
