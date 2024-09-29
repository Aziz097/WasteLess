<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function register(Request $request)
    {
        // Aturan Validasi
        $request->validate([
            'name' => 'required|min:3|alpha', // Validasi nama
            'phone' => 'required|min:10|numeric', // Validasi nomor telepon
            'password' => [
                'required',
                'min:8',
                'regex:/[a-z]/',      // Harus ada huruf kecil
                'regex:/[A-Z]/',      // Harus ada huruf besar
                'regex:/[0-9]/',      // Harus ada angka
                'regex:/[@$!%*#?&]/', // Harus ada karakter khusus
            ],
            'password_confirmation' => 'required|same:password', // Validasi konfirmasi password
        ], [
            // Pesan Kesalahan Kustom
            'name.required' => 'Nama tidak boleh kosong.',
            'name.min' => 'Nama harus lebih dari 2 karakter.',
            'name.alpha' => 'Nama hanya boleh berisi huruf.',
            'phone.required' => 'Nomor HP tidak boleh kosong.',
            'phone.min' => 'Nomor telepon terlalu pendek.',
            'phone.numeric' => 'Nomor HP hanya boleh berisi angka.',
            'password.required' => 'Kata sandi tidak boleh kosong.',
            'password.min' => 'Kata sandi harus minimal 8 karakter.',
            'password.regex' => 'Kata sandi harus mengandung huruf besar, huruf kecil, angka, dan karakter khusus.',
            'password_confirmation.required' => 'Konfirmasi kata sandi tidak boleh kosong.',
            'password_confirmation.same' => 'Kata sandi dan konfirmasi kata sandi tidak cocok.',
        ]);

        // Jika validasi lolos, lakukan sesuatu (misalnya, simpan data)
        // Untuk sekarang, misalnya return success.
        return redirect()->back()->with('success', 'Pendaftaran berhasil.');
    }
}
