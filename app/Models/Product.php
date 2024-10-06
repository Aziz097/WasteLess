<?php

// Product.php (Model)

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'supermarket_id',
        'nama_produk',
        'deskripsi',
        'tanggal_kadaluarsa',
        'alamat_supermarket',
        'harga',
        'stok',
    ];

    // Relasi dengan supermarket
    public function supermarket()
    {
        return $this->belongsTo(Supermarket::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
}
