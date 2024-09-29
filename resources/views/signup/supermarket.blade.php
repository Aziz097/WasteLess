@extends('layouts.app')

@section('title', 'Daftar Sebagai Supermarket')

@section('content')
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div style="width: 100%; max-width: 360px; background-color: white; padding: 20px; border-radius: 15px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); position: relative;">
        <!-- Back Button -->
        <a href="{{ route('register') }}" style="position: absolute; top: 20px; left: 20px; text-decoration: none; font-size: 24px; color: #333;">
            &#8592;
        </a>

        <h1 style="font-size: 24px; font-weight: bold; text-align: center; margin-top: 45px; margin-bottom:20px">Daftar Sebagai Supermarket</h1>

        <!-- Form -->
        <form method="POST" action="{{ route('signup.supermarket') }}">
            @csrf

            <!-- Nama Supermarket -->
            <div style="margin-bottom: 15px;">
                <label for="supermarket_name" style="font-weight: bold; font-size: 14px;">Nama Supermarket</label>
                <input type="text" id="supermarket_name" name="supermarket_name" placeholder="Masukkan nama supermarket" required 
                    style="width: 100%; padding: 10px 15px; font-size: 14px; border-radius: 30px; border: 2px solid #ccc; margin-top: 5px;">
            </div>

            <!-- Nomor HP -->
            <div style="margin-bottom: 15px;">
                <label for="phone" style="font-weight: bold; font-size: 14px;">Nomor HP</label>
                <input type="tel" id="phone" name="phone" placeholder="Masukkan nomor HP" required 
                    style="width: 100%; padding: 10px 15px; font-size: 14px; border-radius: 30px; border: 2px solid #ccc; margin-top: 5px;">
            </div>

            <!-- Kata Sandi -->
            <div style="margin-bottom: 15px;">
                <label for="password" style="font-weight: bold; font-size: 14px;">Kata Sandi</label>
                <div style="position: relative;">
                    <input type="password" id="password" name="password" placeholder="Masukkan kata sandi" required
                        style="width: 100%; padding: 10px 15px; font-size: 14px; border-radius: 30px; border: 2px solid #ccc; padding-right: 50px; margin-top: 5px;">
                    <i class="far fa-eye" id="togglePassword" style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%); cursor: pointer; color: #888;"></i>
                </div>
            </div>

            <!-- Konfirmasi Kata Sandi -->
            <div style="margin-bottom: 15px;">
                <label for="password_confirmation" style="font-weight: bold; font-size: 14px;">Konfirmasi Kata Sandi</label>
                <div style="position: relative;">
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Masukkan ulang kata sandi" required
                        style="width: 100%; padding: 10px 15px; font-size: 14px; border-radius: 30px; border: 2px solid #ccc; padding-right: 50px; margin-top: 5px;">
                    <i class="far fa-eye" id="togglePasswordConfirm" style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%); cursor: pointer; color: #888;"></i>
                </div>
            </div>

    <!-- Terms Checkbox -->
    <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="terms" required>
                <label class="form-check-label" for="terms" style="font-size: 14px;">Saya menyetujui <a href="#" style="color: #28a745;">Ketentuan layanan</a> dan <a href="#" style="color: #28a745;">Kebijakan privasi</a> WasteLess.</label>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-success w-100" style="border-radius: 30px; font-weight: bold; background-color: #28a745; border: none;">Lanjut</button>
        </form>

        <!-- Logo WasteLess -->
        <div class="mt-4 text-center" style="font-size: 12px; color: #333;">
            <img src="/images/footerlogo.png" alt="WasteLess Logo" style="width: 100px;">
        </div>
    </div>
</div>

<!-- Toggle Password Visibility JavaScript -->
<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');
    togglePassword.addEventListener('click', function (e) {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        this.classList.toggle('fa-eye-slash');
    });

    const togglePasswordConfirm = document.querySelector('#togglePasswordConfirm');
    const passwordConfirm = document.querySelector('#password_confirmation');
    togglePasswordConfirm.addEventListener('click', function (e) {
        const type = passwordConfirm.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordConfirm.setAttribute('type', type);
        this.classList.toggle('fa-eye-slash');
    });
</script>
@endsection
