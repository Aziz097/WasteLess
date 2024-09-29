<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // Method to show the customer registration form
    public function showForm()
    {
        return view('signup.customer'); // Adjust view path if necessary
    }

    // Method to handle the customer registration form submission
    public function register(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
            // Add other validation rules as needed
        ]);

        // Process registration logic here (e.g., save user to database)

        // Redirect to a success page or dashboard
        return redirect()->route('home'); // Replace 'home' with the actual route name
    }
}
