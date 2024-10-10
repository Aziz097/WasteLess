<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;

class CartController extends Controller
{
    // Menambahkan produk ke keranjang
    public function addToCart(Request $request)
    {
        // Ambil data produk dari database berdasarkan ID produk
        $product = Product::findOrFail($request->id);
    
        // Masukkan data ke dalam tabel cart
        Cart::create([
            'product_id' => $product->id,
            'product_name' => $product->product_name, // Sertakan nama produk
            'quantity' => $request->quantity,
            'price' => $product->price,
        ]);
    
        return redirect()->route('cart.show')->with('success', 'Produk berhasil ditambahkan ke keranjang.');
    }

    // Menampilkan isi keranjang
    public function showCart()
    {
        // Ambil semua item dari tabel cart
        $cartItems = Cart::all();

        // Hitung subtotal harga di keranjang
        $subtotal = $cartItems->sum(function ($item) {
            return $item->price * $item->quantity;
        });

        // Kirim data ke view 'orderpage'
        return view('homepage.order', compact('cartItems', 'subtotal'));
    }

    public function showCartCheckout()
    {
        // Ambil semua item dari tabel cart
        $cartItems = Cart::all();

        // Hitung subtotal harga di keranjang
        $subtotal = $cartItems->sum(function ($item) {
            return $item->price * $item->quantity;
        });

        // Kirim data ke view 'orderpage'
        return view('homepage.checkout', compact('cartItems', 'subtotal'));
    }

    public function clearCart()
    {
       
        Cart::truncate(); 
        return redirect('/home')->with('success', 'Semua item berhasil dihapus dari keranjang.');
    }

    // Menghapus produk dari keranjang
    public function remove($id)
    {
        // Temukan item berdasarkan ID
        $cartItem = Cart::find($id);

        // Jika item ditemukan, hapus
        if ($cartItem) {
            $cartItem->delete();
            return redirect()->back()->with('success', 'Item berhasil dihapus dari keranjang');
        }

        return redirect()->back()->with('error', 'Item tidak ditemukan');
    }

}
