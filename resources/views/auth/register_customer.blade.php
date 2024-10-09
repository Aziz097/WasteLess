<!-- resources/views/auth/register_customer.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Customer</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Registrasi Customer</h1>
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ url('/register/customer') }}" method="POST">
            @csrf
            <div>
                <label for="name">Nama Lengkap:</label>
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
            <button type="submit">Daftar</button>
        </form>
    </div>
</body>
</html>
