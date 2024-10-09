<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Product extends Model
{
    protected $fillable = ['nama', 'harga', 'expired', 'supermarket_id'];

    // Menghitung harga diskon jika mendekati tanggal kadaluarsa
    public function getDiscountedPriceAttribute()
    {
        $expiryThreshold = now()->addDays(7); // Batas produk yang mendekati kadaluarsa (3 hari)
        if ($this->expired <= $expiryThreshold) {
            return $this->harga * 0.65; // Diskon 35%
        }
        return $this->harga;
    }

    // Event untuk meng-generate id random sebelum create
    protected static function booted()
    {
        static::creating(function ($product) {
            if (!$product->id) {
                $product->id = random_int(1000, 9999); // Random ID 4 digit
            }
        });
    }
}
