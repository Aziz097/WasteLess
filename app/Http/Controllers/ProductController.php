<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supermarket;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // Lokasi pengguna
        $userLatitude = $request->input('latitude');
        $userLongitude = $request->input('longitude');

        // Radius lokasi dengan pengguna 5km
        $supermarket = Supermarket::selectRaw(
            "id, ( 6371 * acos( cos( radians(?) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians(?) ) + sin( radians(?) ) * sin( radians( latitude ) ) ) ) AS distance",
            [$userLatitude, $userLongitude, $userLatitude]
        )
        ->having('distance', '<=', 5)
        ->get();

        // Produk diskon supermarket-supermarket terdekat
        $produk_diskon = Product::whereIn('supermarket_id', $supermarket->pluck('id'))
            ->where('expired', '<=', now()->addDays(7))
            ->get();

        return view('products.index', compact('produk_diskon'));
    }
}

