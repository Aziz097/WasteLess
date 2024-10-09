<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Supermarket;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
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

    // Form untuk menambah produk
    public function create()
    {
        $supermarkets = Supermarket::all();
        return view('products.create', compact('supermarkets'));
    }

    // Menyimpan produk dan gambar
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal_kadaluarsa' => 'required|date',
            'alamat_supermarket' => 'required|string',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'supermarket_id' => 'required|exists:supermarkets,id',
            'gambar.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        ]);

        // Simpan produk
        $product = Product::create($validated);

        // Jika ada gambar yang diupload
        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $image) {
                $path = $image->store('product_images', 'public'); // Simpan gambar ke direktori storage
                
                // Simpan path gambar ke database
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $path,
                ]);
            }
        }

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    // Menampilkan form untuk edit produk
    public function edit(Product $product)
    {
        $supermarkets = Supermarket::all();
        return view('products.edit', compact('product', 'supermarkets'));
    }

    // Update data produk
    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'supermarket_id' => 'required|exists:supermarkets,id',
            'nama_produk' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal_kadaluarsa' => 'required|date',
            'alamat_supermarket' => 'required|string',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'gambar.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        ]);

        // Temukan produk berdasarkan ID
        $product = Product::findOrFail($id);
        
        // Update produk
        $product->update($validated);

        // Jika ada gambar baru yang diupload
        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $image) {
                $path = $image->store('product_images', 'public'); // Simpan gambar ke direktori storage
                
                // Simpan path gambar ke database
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $path,
                ]);
            }
        }

        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui!');
    }

    // Arsipkan produk
    public function archive(Product $product)
    {
        // Logika pengarsipan produk
        $product->update(['status' => 'archived']);

        return redirect()->route('products.index')->with('success', 'Produk berhasil diarsipkan!');
    }

    // Hapus produk
    public function destroy(Product $product)
    {
        // Hapus gambar produk terkait
        foreach ($product->images as $image) {
            Storage::disk('public')->delete($image->image_path);
            $image->delete();
        }

        // Hapus produk
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus!');
    }
}
