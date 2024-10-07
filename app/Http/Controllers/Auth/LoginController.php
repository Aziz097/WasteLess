<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function login(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'phone' => 'required|string',
            'password' => 'required|string',
        ]);

        // Attempt to log the user in using the phone and password
        $credentials = $request->only('phone', 'password');

        if (Auth::attempt($credentials)) {
            // Check the role of the authenticated user
            $user = Auth::user();

            if ($user->role === 'supermarket') {
                return redirect()->route('supermarket-home')->with('success', 'Login successful!');
            } else if ($user->role === 'customer') {
                return redirect()->intended('/home')->with('success', 'Login successful!');
            }
        }

        // If unsuccessful, redirect back to the login form with an error message
        return back()->withErrors([
            'phone' => 'The provided credentials do not match our records.',
        ])->withInput($request->only('phone'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/signin')->with('success', 'You have been logged out.');
    }
}
