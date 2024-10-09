<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supermarket;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Lokasi pengguna
        $userLatitude = $request->input('latitude');
        $userLongitude = $request->input('longitude');

        // Radius lokasi dengan pengguna 5km
        $supermarkets = Supermarket::selectRaw(
            "id, ( 6371 * acos( cos( radians(?) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians(?) ) + sin( radians(?) ) * sin( radians( latitude ) ) ) ) AS distance",
            [$userLatitude, $userLongitude, $userLatitude]
        )
        ->having('distance', '<=', 5)
        ->get();

        // Filter pencarian
        $query = Product::query();

        // Pencarian berdasarkan nama produk
        if ($request->filled('search')) {
            $query->where('nama', 'LIKE', '%' . $request->input('search') . '%');
        }

        // Filter produk diskon di supermarket terdekat dan segera kadaluarsa
        if ($request->input('filter') == 'diskon') {
            $query->whereIn('supermarket_id', $supermarkets->pluck('id'))
                  ->where('expired', '<=', now()->addDays(7));
        }

        // Filter termurah
        if ($request->input('filter') == 'termurah') {
            $query->orderBy('harga', 'asc');
        }

        // Filter terlaris
        if ($request->input('filter') == 'terlaris') {
            $query->orderBy('jumlah_beli', 'desc');
        }

        // Filter terdekat
        if ($request->input('filter') == 'terdekat') {
            $query->inRandomOrder();
        }

        // Ambil hasil pencarian
        $results = $query->get();

        return view('search', compact('results'));
    }
}