<?php

namespace App\Http\Controllers;

//use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('search');

        if ($query) {
            // Cari produk berdasarkan nama
            $results = Products::where("nama",  "like", "%$query%")->get();
        } else {
            // Tampilkan semua produk jika tidak ada pencarian
            $results = Products::all();
        }

        return view('search', compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function search(Request $request)
    {
        $query = Products::query();

        // Jika ada parameter search
        if ($request->filled('search')) {
            $query->where('nama', 'LIKE', '%' . $request->input('search') . '%');
        }

        // Jika ada filter termurah
        if ($request->input('filter') == 'termurah') {
            $query->orderBy('harga', 'asc');
        }

        // Jika ada filter terlaris
        if ($request->input('filter') == 'terlaris') {
            $query->orderBy('jumlah_beli', 'desc'); // Urutkan berdasarkan jumlah terjual terbanyak
        }

        // Ambil hasil pencarian
        $results = $query->get();

        return view('search', compact('results'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        // $search = $request->input('search');
        // $results = Products::where('nama', 'like', "%$search%")->get();

        // return view('products.index', ['results' => $results]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
