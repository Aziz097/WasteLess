@extends('layouts.app')

@section('title', 'Daftar Sebagai Customer')

@section('content')
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div style="width: 100%; max-width: 360px; background-color: white; padding: 20px; border-radius: 15px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); position: relative;">
        <!-- Back Button -->
        <a href="{{ route('register') }}" style="position: absolute; top: 20px; left: 20px; text-decoration: none; font-size: 24px; color: #333;">
            &#8592;
        </a>

        <h1 style="font-size: 24px; font-weight: bold; text-align: center; margin-top: 45px; margin-bottom:20px">Daftar Sebagai Customer</h1>
        
        <!-- Form -->
        <form method="POST" action="{{ route('signup.customer') }}">
            @csrf
            <!-- Nama Lengkap -->
            <div class="mb-3">
                <label for="name" class="form-label" style="font-weight: bold;">Nama Lengkap</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Masukkan nama lengkap" required style="border-radius: 30px; border: 2px solid #ccc;">
                @error('name')
                    <div class="invalid-feedback" style="color: red;">
                        <i class="fas fa-exclamation-circle"></i> {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Nomor HP -->
            <div class="mb-3">
                <label for="phone" class="form-label" style="font-weight: bold;">Nomor HP</label>
                <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" placeholder="Masukkan nomor HP" required style="border-radius: 30px; border: 2px solid #ccc;">
                @error('phone')
                    <div class="invalid-feedback" style="color: red;">
                        <i class="fas fa-exclamation-circle"></i> {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Kata Sandi -->
            <div class="mb-3">
                <label for="password" class="form-label" style="font-weight: bold;">Kata Sandi</label>
                <div class="input-group">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Masukkan kata sandi" required style="border-radius: 30px; border: 2px solid #ccc; padding-right: 40px;">
                    <span class="input-group-text" id="togglePassword" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); background: none; border: none; cursor: pointer;">
                        <i class="far fa-eye" id="eyeIcon"></i>
                    </span>
                </div>
                @error('password')
                    <div class="invalid-feedback" style="color: red;">
                        <i class="fas fa-exclamation-circle"></i> {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Konfirmasi Kata Sandi -->
            <div class="mb-3">
                <label for="password_confirmation" class="form-label" style="font-weight: bold;">Konfirmasi Kata Sandi</label>
                <div class="input-group">
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="Masukkan ulang kata sandi" required style="border-radius: 30px; border: 2px solid #ccc; padding-right: 40px;">
                    <span class="input-group-text" id="togglePasswordConfirm" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); background: none; border: none; cursor: pointer;">
                        <i class="far fa-eye" id="eyeIconConfirm"></i>
                    </span>
                </div>
                @error('password_confirmation')
                    <div class="invalid-feedback" style="color: red;">
                        <i class="fas fa-exclamation-circle"></i> {{ $message }}
                    </div>
                @enderror
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

    <!-- JavaScript to toggle password visibility -->
    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');
        const eyeIcon = document.querySelector('#eyeIcon');

        togglePassword.addEventListener('click', function (e) {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            eyeIcon.classList.toggle('fa-eye');
            eyeIcon.classList.toggle('fa-eye-slash');
        });

        const togglePasswordConfirm = document.querySelector('#togglePasswordConfirm');
        const passwordConfirm = document.querySelector('#password_confirmation');
        const eyeIconConfirm = document.querySelector('#eyeIconConfirm');

        togglePasswordConfirm.addEventListener('click', function (e) {
            const type = passwordConfirm.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordConfirm.setAttribute('type', type);
            eyeIconConfirm.classList.toggle('fa-eye');
            eyeIconConfirm.classList.toggle('fa-eye-slash');
        });
    </script>
    @endsection
