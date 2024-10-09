<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Method untuk registrasi customer
    public function registerCustomer(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|unique:users',
            'password' => 'required|confirmed',
        ]);

       user :: create([
            'name' => $request->name,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => 'customer', // Set role sebagai customer
        ]);

        return response()->json(['message' => 'Customer registered successfully']);
    }

    // Method untuk registrasi supermarket
    public function registerSupermarket(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|unique:users',
            'password' => 'required|confirmed',
            'npwp' => 'required',
            'address' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => 'supermarket', // Set role sebagai supermarket
            'npwp' => $request->npwp,
            'address' => $request->address,
        ]);

        return response()->json(['message' => 'Supermarket registered successfully']);
    }

    public function login(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('phone', $request->phone)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors(['phone' => 'Phone atau password salah.']);
        }

        // Atur session atau token di sini berdasarkan role
        if ($user->role === 'customer') {
            return redirect('/customer/home')->with('message', 'Login berhasil');
        } elseif ($user->role === 'supermarket') {
            return redirect('/supermarket/home')->with('message', 'Login berhasil');
        }
    }

    public function showRegisterCustomerForm()
    {
        return view('auth.register_customer'); // Ubah ke nama file blade yang sesuai
    }

    public function showRegisterSupermarketForm()
    {
        return view('auth.register_supermarket'); // Ubah ke nama file blade yang sesuai
    }
    public function showLoginForm()
    {
        return view('auth.login'); // Pastikan ada file auth/login.blade.php
    }

    
}
