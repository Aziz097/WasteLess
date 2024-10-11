<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function index()
    {
        // Get the authenticated user
        $customer = Auth::user();

        // Pass the user data to the view
        return view('homepage.profilepage', compact('customer'));
    }
    
}
