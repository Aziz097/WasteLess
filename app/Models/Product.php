<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $keyType = 'integer';
    protected $table = 'products';

    protected $fillable = [
        'supermarket_id',
        'nama_produk',
        'deskripsi',
        'variasi',
        'harga',
        'diskon',
        'stok',
        'masa_simpan',
        'expired',
        'berat',
        'kode_BPOM',
        'jumlah_beli',
        'alamat_supermarket',
    ];

    // Relasi dengan supermarket
    public function supermarket()
    {
        return $this->belongsTo(Supermarket::class);
    }

    // Relasi dengan gambar produk
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    // Menghitung harga diskon jika mendekati tanggal kadaluarsa
    public function getDiscountedPriceAttribute()
    {
        $expiryThreshold = now()->addDays(7); // Batas produk yang mendekati kadaluarsa dalam 7 hari
        if ($this->expired <= $expiryThreshold) {
            return $this->harga * 0.65; // Diskon 35%
        }
        return $this->harga;
    }
}
