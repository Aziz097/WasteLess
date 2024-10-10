<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupermarketController extends Controller
{
    public function index()
    {
        // Get the authenticated user
        $supermarket = Auth::user();

        // Pass the user data to the view
        return view('supermarkethomepage.supermarkethomepage', compact('supermarket'));
    }
}
