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
        <form method="POST" action="{{ route('signup.customer') }}" id="customerForm">
            @csrf
            <!-- Nama Lengkap -->
            <div class="mb-3">
                <label for="name" class="form-label" style="font-weight: bold;">Nama Lengkap</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Masukkan nama lengkap" required style="border-radius: 30px; border: 2px solid #ccc;">
                <div id="name-error" style="color: red; display: none;">
                    <i class="fas fa-exclamation-circle"></i> <span></span>
                </div>
            </div>

            <!-- Nomor HP -->
            <div class="mb-3">
                <label for="phone" class="form-label" style="font-weight: bold;">Nomor HP</label>
                <input type="tel" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" placeholder="Masukkan nomor HP" required style="border-radius: 30px; border: 2px solid #ccc;">
                <div id="phone-error" style="color: red; display: none;">
                    <i class="fas fa-exclamation-circle"></i> <span></span>
                </div>
            </div>

            <!-- Kata Sandi -->
            <div class="mb-3">
                <label for="password" class="form-label" style="font-weight: bold;">Kata Sandi</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan kata sandi" required style="border-radius: 30px; border: 2px solid #ccc; padding-right: 40px;">
                    <span class="input-group-text" id="togglePassword" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); background: none; border: none; cursor: pointer;">
                        <i class="far fa-eye" id="eyeIcon"></i>
                    </span>
                </div>
                <div id="password-error" style="color: red; display: none;">
                    <i class="fas fa-exclamation-circle"></i> <span></span>
                </div>
            </div>

            <!-- Konfirmasi Kata Sandi -->
            <div class="mb-3">
                <label for="password_confirmation" class="form-label" style="font-weight: bold;">Konfirmasi Kata Sandi</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Masukkan ulang kata sandi" required style="border-radius: 30px; border: 2px solid #ccc; padding-right: 40px;">
                    <span class="input-group-text" id="togglePasswordConfirm" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); background: none; border: none; cursor: pointer;">
                        <i class="far fa-eye" id="eyeIconConfirm"></i>
                    </span>
                </div>
                <div id="password-confirm-error" style="color: red; display: none;">
                    <i class="fas fa-exclamation-circle"></i> <span></span>
                </div>
            </div>

            <!-- Terms Checkbox -->
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="terms" required>
                <label class="form-check-label" for="terms" style="font-size: 14px;">Saya menyetujui <a href="#" style="color: #28a745;">Ketentuan layanan</a> dan <a href="#" style="color: #28a745;">Kebijakan privasi</a> WasteLess.</label>
            </div>

            <!-- Submit Button -->
            <button type="submit" id="submitButton" class="btn btn-success w-100" style="border-radius: 30px; font-weight: bold; background-color: #28a745; border: none;" disabled>Lanjut</button>
        </form>

        <!-- Logo WasteLess -->
        <div class="mt-4 text-center" style="font-size: 12px; color: #333;">
            <img src="/images/footerlogo.png" alt="WasteLess Logo" style="width: 100px;">
        </div>
    </div>
</div>

<script>
    const fullNameInput = document.getElementById('name');
    const phoneInput = document.getElementById('phone');
    const passwordInput = document.getElementById('password');
    const passwordConfirmInput = document.getElementById('password_confirmation');
    const submitButton = document.getElementById('submitButton');
    const termsCheckbox = document.getElementById('terms');

    // Error message elements
    const nameError = document.getElementById('name-error').querySelector('span');
    const phoneError = document.getElementById('phone-error').querySelector('span');
    const passwordError = document.getElementById('password-error').querySelector('span');
    const passwordConfirmError = document.getElementById('password-confirm-error').querySelector('span');

    // Validation logic
    function validateName() {
        const value = fullNameInput.value.trim();
        if (value === '') {
            nameError.textContent = 'Nama tidak boleh kosong.';
            nameError.parentElement.style.display = 'block';
            return false;
        }
        if (value.length <= 2) {
            nameError.textContent = 'Nama harus lebih dari 2 karakter.';
            nameError.parentElement.style.display = 'block';
            return false;
        }
        if (!/^[A-Za-z\s]+$/.test(value)) {
            nameError.textContent = 'Nama hanya boleh berisi huruf.';
            nameError.parentElement.style.display = 'block';
            return false;
        }
        nameError.parentElement.style.display = 'none';
        return true;
    }

    function validatePhone() {
        const value = phoneInput.value.trim();
        if (value === '') {
            phoneError.textContent = 'Nomor HP tidak boleh kosong.';
            phoneError.parentElement.style.display = 'block';
            return false;
        }
        if (!/^[0-9]+$/.test(value)) {
            phoneError.textContent = 'Nomor HP hanya boleh berisi angka.';
            phoneError.parentElement.style.display = 'block';
            return false;
        }
        if (value.length < 10) {
            phoneError.textContent = 'Nomor telepon terlalu pendek.';
            phoneError.parentElement.style.display = 'block';
            return false;
        }
        phoneError.parentElement.style.display = 'none';
        return true;
    }

    function validatePassword() {
        const value = passwordInput.value.trim();
        if (value === '') {
            passwordError.textContent = 'Kata sandi tidak boleh kosong.';
            passwordError.parentElement.style.display = 'block';
            return false;
        }
        if (value.length < 8) {
            passwordError.textContent = 'Kata sandi harus minimal 8 karakter.';
            passwordError.parentElement.style.display = 'block';
            return false;
        }
        if (!/[A-Za-z]/.test(value) || !/[0-9]/.test(value)) {
            passwordError.textContent = 'Kata sandi harus mengandung huruf dan angka.';
            passwordError.parentElement.style.display = 'block';
            return false;
        }
        if (!/[!@#$%^&*]/.test(value)) {
            passwordError.textContent = 'Kata sandi harus mengandung karakter khusus.';
            passwordError.parentElement.style.display = 'block';
            return false;
        }
        passwordError.parentElement.style.display = 'none';
        return true;
    }

    function validatePasswordConfirmation() {
        const password = passwordInput.value.trim();
        const confirmPassword = passwordConfirmInput.value.trim();
        if (confirmPassword === '') {
            passwordConfirmError.textContent = 'Konfirmasi kata sandi tidak boleh kosong.';
            passwordConfirmError.parentElement.style.display = 'block';
            return false;
        }
        if (password !== confirmPassword) {
            passwordConfirmError.textContent = 'Kata sandi dan konfirmasi kata sandi tidak cocok.';
            passwordConfirmError.parentElement.style.display = 'block';
            return false;
        }
        passwordConfirmError.parentElement.style.display = 'none';
        return true;
    }

    function checkFormValidity() {
        const isNameValid = validateName();
        const isPhoneValid = validatePhone();
        const isPasswordValid = validatePassword();
        const isPasswordConfirmValid = validatePasswordConfirmation();
        const isTermsChecked = termsCheckbox.checked;

        submitButton.disabled = !(isNameValid && isPhoneValid && isPasswordValid && isPasswordConfirmValid && isTermsChecked);
        submitButton.style.backgroundColor = submitButton.disabled ? '#ccc' : '#28a745';
    }

    fullNameInput.addEventListener('input', checkFormValidity);
    phoneInput.addEventListener('input', checkFormValidity);
    passwordInput.addEventListener('input', checkFormValidity);
    passwordConfirmInput.addEventListener('input', checkFormValidity);
    termsCheckbox.addEventListener('change', checkFormValidity);

    // Toggle password visibility
    const togglePassword = document.querySelector('#togglePassword');
    togglePassword.addEventListener('click', function () {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        this.querySelector('i').classList.toggle('fa-eye-slash');
    });

    const togglePasswordConfirm = document.querySelector('#togglePasswordConfirm');
    togglePasswordConfirm.addEventListener('click', function () {
        const type = passwordConfirmInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordConfirmInput.setAttribute('type', type);
        this.querySelector('i').classList.toggle('fa-eye-slash');
    });
</script>

@endsection
