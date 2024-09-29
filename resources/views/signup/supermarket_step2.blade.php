@extends('layouts.app')

@section('title', 'Daftar Sebagai Supermarket')

@section('content')
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div style="width: 100%; max-width: 360px; background-color: white; padding: 20px; border-radius: 15px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); position: relative;">
        <!-- Back Button -->
        <a href="{{ route('signup.supermarket') }}" style="position: absolute; top: 20px; left: 20px; text-decoration: none; font-size: 24px; color: #333;">
            &#8592;
        </a>

        <h1 style="font-size: 24px; font-weight: bold; text-align: center; margin-top: 45px; margin-bottom: 20px;">Daftar Sebagai Supermarket</h1>

        <!-- Form -->
        <form method="POST" action="{{ route('signup.supermarket.step2') }}" id="supermarketForm">
            @csrf

            <!-- NPWP/SIUP Field -->
            <div style="margin-bottom: 15px;">
                <label for="npwp" style="font-weight: bold; font-size: 14px;">NPWP/SIUP</label>
                <input type="text" id="npwp" name="npwp" placeholder="Masukkan NPWP/SIUP" required 
                    style="width: 100%; padding: 10px 15px; font-size: 14px; border-radius: 15px; border: 2px solid #ccc; margin-top: 5px;">
                <div id="npwp-error" style="display: none; color: #ff4f4f; font-size: 12px; margin-top: 5px;">
                    <i class="fas fa-exclamation-circle" style="margin-right: 5px;"></i>
                    <span></span>
                </div>
            </div>

            <!-- Alamat Supermarket -->
            <div style="margin-bottom: 15px;">
                <label for="address" style="font-weight: bold; font-size: 14px;">Alamat Supermarket</label>
                <textarea id="address" name="address" placeholder="Masukkan alamat supermarket" required 
                    style="width: 100%; padding: 10px 15px; font-size: 14px; border-radius: 15px; border: 2px solid #ccc; margin-top: 5px;"></textarea>
                <div id="address-error" style="display: none; color: #ff4f4f; font-size: 12px; margin-top: 5px;">
                    <i class="fas fa-exclamation-circle" style="margin-right: 5px;"></i>
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

<!-- Form Validation Script -->
<script>
    const npwpInput = document.getElementById('npwp');
    const addressInput = document.getElementById('address');
    const npwpErrorIcon = document.getElementById('npwp-error').querySelector('i');
    const npwpErrorText = document.getElementById('npwp-error').querySelector('span');
    const addressErrorIcon = document.getElementById('address-error').querySelector('i');
    const addressErrorText = document.getElementById('address-error').querySelector('span');
    const submitButton = document.getElementById('submitButton');
    const termsCheckbox = document.getElementById('terms');

    // NPWP/SIUP Validation
    function validateNPWP() {
        const npwpValue = npwpInput.value.trim();
        
        if (npwpValue === '') {
            npwpErrorText.textContent = 'NPWP/SIUP tidak boleh kosong.';
            npwpErrorIcon.style.color = 'red';
            npwpErrorText.parentElement.style.display = 'flex';
            npwpInput.style.borderColor = '#ff4f4f';
            return false;
        }
        
        const isValid = /^[0-9]{15,25}$/.test(npwpValue);
        if (!isValid) {
            npwpErrorText.textContent = 'Format NPWP/SIUP tidak valid. Periksa kembali nomor yang Anda masukkan.';
            npwpErrorIcon.style.color = 'red';
            npwpErrorText.parentElement.style.display = 'flex';
            npwpInput.style.borderColor = '#ff4f4f';
            return false;
        }

        npwpInput.style.borderColor = '#ccc';
        npwpErrorText.parentElement.style.display = 'none';
        return true;
    }

    // Address Validation
    function validateAddress() {
        const addressValue = addressInput.value.trim();
        
        if (addressValue === '') {
            addressErrorText.textContent = 'Alamat tidak boleh kosong.';
            addressErrorIcon.style.color = 'red';
            addressErrorText.parentElement.style.display = 'flex';
            addressInput.style.borderColor = '#ff4f4f';
            return false;
        }

        if (addressValue.length < 10) {
            addressErrorText.textContent = 'Alamat terlalu singkat. Harap isi dengan alamat lengkap.';
            addressErrorIcon.style.color = 'red';
            addressErrorText.parentElement.style.display = 'flex';
            addressInput.style.borderColor = '#ff4f4f';
            return false;
        }

        addressInput.style.borderColor = '#ccc';
        addressErrorText.parentElement.style.display = 'none';
        return true;
    }

    // Enable or disable submit button based on form validity
    termsCheckbox.addEventListener('change', checkFormValidity);

    function checkFormValidity() {
        const isValidNPWP = validateNPWP();
        const isValidAddress = validateAddress();
        const isTermsChecked = termsCheckbox.checked;
        
        submitButton.disabled = !(isValidNPWP && isValidAddress && isTermsChecked);
        submitButton.style.backgroundColor = (isValidNPWP && isValidAddress && isTermsChecked) ? '#28a745' : '#ccc';
        submitButton.style.cursor = (isValidNPWP && isValidAddress && isTermsChecked) ? 'pointer' : 'not-allowed';
    }

    // Validate inputs on change
    npwpInput.addEventListener('input', checkFormValidity);
    addressInput.addEventListener('input', checkFormValidity);

    // Prevent form submission if invalid
    document.getElementById('supermarketForm').addEventListener('submit', function (e) {
        if (!submitButton.disabled) {
            alert('Form submitted successfully!');
        } else {
            e.preventDefault();
        }
    });
</script>
@endsection
