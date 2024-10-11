<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // Default query untuk mendapatkan semua produk
        $query = Product::query();
    
        // Cek filter apa yang dipilih oleh pengguna
        if ($request->has('filter')) {
            $filter = $request->filter;
    
            if ($filter == 'terdekat') {
                $query->orderBy('id', 'asc'); // Ganti dengan logika geolocation jika ada
            } elseif ($filter == 'termurah') {
                $query->orderBy('price', 'asc'); // Urutkan berdasarkan harga termurah
            } elseif ($filter == 'terlaris') {
                // Ambil produk secara acak
                $products = Product::inRandomOrder()->paginate(5); // Ambil 4 produk acak
                return view('homepage.userhomepage', compact('products')); // Kirim produk acak ke view
            }
        }

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('product_name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }
    
        // Lakukan paginasi setelah filter diterapkan
        $products = $query->paginate(5);
    
        // Kirim produk yang difilter ke view
        return view('homepage.userhomepage', compact('products'));
    }
    
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'product_name' => 'required',
            'description' => 'required',
            'expiration_date' => 'required|date',
            'supermarket_address' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'product_image' => 'required|image|max:2048',
        ]);

        // Upload gambar
        $imagePath = $request->file('product_image')->store('product_images', 'public');

        // Simpan data ke database
        Product::create([
            'product_name' => $request->product_name,
            'description' => $request->description,
            'expiration_date' => $request->expiration_date,
            'supermarket_address' => $request->supermarket_address,
            'price' => $request->price,
            'stock' => $request->stock,
            'product_image' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan');
    }

    public function showAllProducts()
    {
        // Mengambil semua produk dari database
        $products = Product::paginate(5);

        // Kirim semua produk ke view 'homepage.products'
        return view('supermarkethomepage.produk', compact('products'));
    }

    public function destroy($id)
    {
        // Cari produk berdasarkan ID
        $product = Product::find($id);

        if ($product) {
            // Hapus produk
            $product->delete();

            // Redirect kembali dengan pesan sukses
            return redirect()->back()->with('success', 'Produk berhasil dihapus');
        } else {
            // Jika produk tidak ditemukan
            return redirect()->back()->with('error', 'Produk tidak ditemukan');
        }
    }

    public function showAlmostExpiredProducts()
    {
        // Mendapatkan tanggal saat ini
        $currentDate = Carbon::now();
        // Mendapatkan tanggal 3 hari ke depan
        $thresholdDate = $currentDate->copy()->addDays(3); // Gunakan copy() untuk menjaga $currentDate tetap tidak berubah

        // Mengambil semua produk yang kedaluwarsanya antara sekarang dan 3 hari ke depan
        $almostExpiredProducts = Product::where('expiration_date', '>=', $currentDate)
            ->where('expiration_date', '<=', $thresholdDate)
            ->get();

        // Mengirim data produk hampir kadaluarsa ke view
        return view('supermarkethomepage.donasi', compact('almostExpiredProducts'));
    }

        // Metode untuk menampilkan detail donasi produk
        public function showDonationDetail($id)
        {
            $product = Product::findOrFail($id);
            return view('supermarkethomepage.donasidetail', compact('product'));
        }
    
        // Metode untuk menghapus produk
        public function donasi($id)
        {
            $product = Product::findOrFail($id);
            $product->delete();
        
            // Redirect ke halaman sukses setelah produk dihapus
            return redirect()->route('donasi.succes')->with('success', 'Produk berhasil didonasikan.');
        }

        public function show($id)
{
    // Mengambil produk berdasarkan ID
    $product = Product::findOrFail($id);

    // Mengirim data produk ke view detailproduk
    return view('homepage.produkdetail', compact('product'));
}
}
