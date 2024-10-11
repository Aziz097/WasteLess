<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function registerCustomer(Request $request)
    {
        // Validate the incoming request data for customer registration
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'terms' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Create a new customer user
        User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => 'customer', // Role set to customer
        ]);

        // Redirect to the login page with a success message
        return redirect()->route('login')->with('success', 'Registration successful! You can now log in.');
    }


    // Register a new supermarket
    public function registerSupermarket(Request $request)
    {
        // Validate the incoming request data for supermarket registration
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15|unique:users',
            'npwp'  => 'required|string|max:20',
            'address'  => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
            'terms' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Create a new supermarket user
        User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'npwp' => $request->npwp,
            'address' => $request->address  ,
            'password' => Hash::make($request->password),
            'role' => 'supermarket', // Role set to supermarket
        ]);

        // Redirect to the login page with a success message
        return redirect()->route('login')->with('success', 'Registration successful! You can now log in.');
    }
}
