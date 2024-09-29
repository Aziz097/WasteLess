@extends('layouts.app')

@section('title', 'Daftar Sebagai Supermarket')

@section('content')
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div style="width: 100%; max-width: 360px; background-color: white; padding: 20px; border-radius: 15px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); position: relative;">
        <!-- Back Button -->
        <a href="{{ route('register') }}" style="position: absolute; top: 20px; left: 20px; text-decoration: none; font-size: 24px; color: #333;">
            &#8592;
        </a>

        <h1 style="font-size: 24px; font-weight: bold; text-align: center; margin-top: 45px; margin-bottom: 20px;">Daftar Sebagai Supermarket</h1>

        <!-- Form -->
        <form method="POST" action="{{ route('signup.supermarket') }}" id="customerForm">
            @csrf

            <!-- Nama Lengkap -->
            <div style="margin-bottom: 15px;">
                <label for="full_name" style="font-weight: bold;">Nama Lengkap</label>
                <input type="text" id="full_name" name="full_name" placeholder="Masukkan nama lengkap" required 
                    style="width: 100%; padding: 10px 15px; border-radius: 30px; border: 2px solid #ccc; margin-top: 5px;">
                <div id="name-error" style="display: none; color: red; margin-top: 5px;">
                    <i class="fas fa-exclamation-circle"></i></i>
                    <span></span>
                </div>
            </div>

            <!-- Nomor HP -->
            <div style="margin-bottom: 15px;">
                <label for="phone" style="font-weight: bold;">Nomor HP</label>
                <input type="tel" id="phone" name="phone" placeholder="Masukkan nomor HP" required 
                    style="width: 100%; padding: 10px 15px; border-radius: 30px; border: 2px solid #ccc; margin-top: 5px;">
                <div id="phone-error" style="display: none; color: red; margin-top: 5px;">
                    <i class="fas fa-exclamation-circle"></i></i>
                    <span></span>
                </div>
            </div>

            <!-- Kata Sandi -->
            <div style="margin-bottom: 15px;">
                <label for="password" style="font-weight: bold;">Kata Sandi</label>
                <div style="position: relative;">
                    <input type="password" id="password" name="password" placeholder="Masukkan kata sandi" required
                        style="width: 100%; padding: 10px 15px; border-radius: 30px; border: 2px solid #ccc; padding-right: 50px; margin-top: 5px;">
                    <i class="far fa-eye" id="togglePassword" style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%); cursor: pointer; color: #888;"></i>
                </div>
                <div id="password-error" style="display: none; color: red; margin-top: 5px;">
                    <i class="fas fa-exclamation-circle"></i></i>
                    <span></span>
                </div>
            </div>

            <!-- Konfirmasi Kata Sandi -->
            <div style="margin-bottom: 15px;">
                <label for="password_confirmation" style="font-weight: bold;">Konfirmasi Kata Sandi</label>
                <div style="position: relative;">
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Masukkan ulang kata sandi" required
                        style="width: 100%; padding: 10px 15px; border-radius: 30px; border: 2px solid #ccc; padding-right: 50px; margin-top: 5px;">
                    <i class="far fa-eye" id="togglePasswordConfirm" style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%); cursor: pointer; color: #888;"></i>
                </div>
                <div id="password-confirm-error" style="display: none; color: red; margin-top: 5px;">
                    <i class="fas fa-exclamation-circle"></i></i>
                    <span></span>
                </div>
            </div>

            <!-- Terms Checkbox -->
            <div style="margin-bottom: 15px; display: flex; align-items: center;">
                <input type="checkbox" id="terms" name="terms" required style="margin-right: 10px;">
                <label for="terms" style="font-size: 14px;">
                    Saya menyetujui <a href="#" style="color: #28a745;">Ketentuan layanan</a> dan <a href="#" style="color: #28a745;">Kebijakan privasi</a> WasteLess.
                </label>
            </div>

            <!-- Submit Button -->
            <button type="submit" id="submitButton" style="width: 100%; padding: 12px; font-size: 16px; border-radius: 30px; background-color: #ccc; color: white; border: none; font-weight: bold;" disabled>Lanjut</button>
        </form>

        <!-- Logo WasteLess -->
        <div class="mt-4 text-center" style="font-size: 12px; color: #333;">
            <img src="/images/footerlogo.png" alt="WasteLess Logo" style="width: 100px;">
        </div>
    </div>
</div>

<!-- Validation Script -->
<script>
    const fullNameInput = document.getElementById('full_name');
    const phoneInput = document.getElementById('phone');
    const passwordInput = document.getElementById('password');
    const passwordConfirmInput = document.getElementById('password_confirmation');
    const submitButton = document.getElementById('submitButton');
    const termsCheckbox = document.getElementById('terms');
    const passwordStrengthText = document.createElement('div'); // Create a div for password strength
    passwordStrengthText.style.fontSize = '12px';
    passwordStrengthText.style.marginTop = '5px';
    passwordInput.parentNode.appendChild(passwordStrengthText); // Append it after the password input field

    // Error message elements
    const nameErrorIcon = document.getElementById('name-error').querySelector('i');
    const nameErrorText = document.getElementById('name-error').querySelector('span');
    const phoneErrorIcon = document.getElementById('phone-error').querySelector('i');
    const phoneErrorText = document.getElementById('phone-error').querySelector('span');
    const passwordErrorIcon = document.getElementById('password-error').querySelector('i');
    const passwordErrorText = document.getElementById('password-error').querySelector('span');
    const passwordConfirmErrorIcon = document.getElementById('password-confirm-error').querySelector('i');
    const passwordConfirmErrorText = document.getElementById('password-confirm-error').querySelector('span');

    // Validation logic
    function validateName() {
        const value = fullNameInput.value.trim();
        if (value === '') {
            nameErrorText.textContent = 'Nama tidak boleh kosong.';
            nameErrorIcon.style.color = 'red';
            nameErrorText.parentElement.style.display = 'block';
            return false;
        }
        if (value.length <= 2) {
            nameErrorText.textContent = 'Nama harus lebih dari 2 karakter.';
            nameErrorIcon.style.color = 'red';
            nameErrorText.parentElement.style.display = 'block';
            return false;
        }
        if (!/^[A-Za-z\s]+$/.test(value)) {
            nameErrorText.textContent = 'Nama hanya boleh berisi huruf.';
            nameErrorIcon.style.color = 'red';
            nameErrorText.parentElement.style.display = 'block';
            return false;
        }
        nameErrorText.parentElement.style.display = 'none';
        return true;
    }

    function validatePhone() {
        const value = phoneInput.value.trim();
        if (value === '') {
            phoneErrorText.textContent = 'Nomor HP tidak boleh kosong.';
            phoneErrorIcon.style.color = 'red';
            phoneErrorText.parentElement.style.display = 'block';
            return false;
        }
        if (!/^[0-9]+$/.test(value)) {
            phoneErrorText.textContent = 'Nomor HP hanya boleh berisi angka.';
            phoneErrorIcon.style.color = 'red';
            phoneErrorText.parentElement.style.display = 'block';
            return false;
        }
        if (value.length < 10) {
            phoneErrorText.textContent = 'Nomor telepon terlalu pendek.';
            phoneErrorIcon.style.color = 'red';
            phoneErrorText.parentElement.style.display = 'block';
            return false;
        }
        phoneErrorText.parentElement.style.display = 'none';
        return true;
    }

    function validatePassword() {
        const value = passwordInput.value.trim();
        if (value === '') {
            passwordErrorText.textContent = 'Kata sandi tidak boleh kosong.';
            passwordErrorIcon.style.color = 'red';
            passwordErrorText.parentElement.style.display = 'block';
            return false;
        }
        if (value.length < 8) {
            passwordErrorText.textContent = 'Kata sandi harus minimal 8 karakter.';
            passwordErrorIcon.style.color = 'red';
            passwordErrorText.parentElement.style.display = 'block';
            return false;
        }
        if (!/[A-Z]/.test(value)) {
            passwordErrorText.textContent = 'Kata sandi harus mengandung setidaknya satu huruf kapital.';
            passwordErrorIcon.style.color = 'red';
            passwordErrorText.parentElement.style.display = 'block';
            return false;
        }
        if (!/[A-Za-z]/.test(value) || !/[0-9]/.test(value)) {
            passwordErrorText.textContent = 'Kata sandi harus mengandung huruf dan angka.';
            passwordErrorIcon.style.color = 'red';
            passwordErrorText.parentElement.style.display = 'block';
            return false;
        }
        if (!/[!@#$%^&*]/.test(value)) {
            passwordErrorText.textContent = 'Kata sandi harus mengandung karakter khusus.';
            passwordErrorIcon.style.color = 'red';
            passwordErrorText.parentElement.style.display = 'block';
            return false;
        }
        passwordErrorText.parentElement.style.display = 'none';
        return true;
    }

    function validatePasswordConfirmation() {
        const password = passwordInput.value.trim();
        const confirmPassword = passwordConfirmInput.value.trim();
        if (confirmPassword === '') {
            passwordConfirmErrorText.textContent = 'Konfirmasi kata sandi tidak boleh kosong.';
            passwordConfirmErrorIcon.style.color = 'red';
            passwordConfirmErrorText.parentElement.style.display = 'block';
            return false;
        }
        if (password !== confirmPassword) {
            passwordConfirmErrorText.textContent = 'Kata sandi dan konfirmasi kata sandi tidak cocok.';
            passwordConfirmErrorIcon.style.color = 'red';
            passwordConfirmErrorText.parentElement.style.display = 'block';
            return false;
        }
        passwordConfirmErrorText.parentElement.style.display = 'none';
        return true;
    }

    // Password Strength Indicator
    function checkPasswordStrength() {
        const password = passwordInput.value;
        let strength = 'Weak';
        let color = 'red';

        // Check for password strength
        if (password.length >= 8) {
            if (/[A-Z]/.test(password) && /[a-z]/.test(password) && /[0-9]/.test(password)) {
                strength = 'Medium';
                color = 'orange';
            }
            if (/[A-Z]/.test(password) && /[a-z]/.test(password) && /[0-9]/.test(password) && /[!@#$%^&*]/.test(password)) {
                strength = 'Strong';
                color = 'green';
            }
        }

        // Display the password strength text
        passwordStrengthText.textContent = `Kekuatan Kata Sandi: ${strength}`;
        passwordStrengthText.style.color = color;
    }

    function checkFormValidity() {
        const isNameValid = validateName();
        const isPhoneValid = validatePhone();
        const isPasswordValid = validatePassword();
        const isPasswordConfirmValid = validatePasswordConfirmation();
        const isTermsChecked = termsCheckbox.checked;

        // Check the password strength
        checkPasswordStrength();

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
        this.classList.toggle('fa-eye-slash');
    });

    const togglePasswordConfirm = document.querySelector('#togglePasswordConfirm');
    togglePasswordConfirm.addEventListener('click', function () {
        const type = passwordConfirmInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordConfirmInput.setAttribute('type', type);
        this.classList.toggle('fa-eye-slash');
    });
</script>



@endsection
