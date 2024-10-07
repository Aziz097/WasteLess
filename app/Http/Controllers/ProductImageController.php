<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\ProductImage;
use Illuminate\Support\Facades\Storage;

class ProductImageController extends Controller
{
    public function index(int $productId) 
    {

    }
    public function destroy($id)
    {
    $image = ProductImage::findOrFail($id);
    
    // Hapus gambar dari storage
    Storage::disk('public')->delete($image->image_path);
    
    // Hapus entry dari database
    $image->delete();

    return redirect()->back()->with('success', 'Gambar berhasil dihapus.');
    }
}

