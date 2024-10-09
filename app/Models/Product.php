<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Products extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $keyType = 'integer';

    protected $fillable = [
        'nama',
        'deskripsi',
        'variasi',
        'harga',
        'diskon',
        'stok',
        'masa_simpan',
        'expired',
        'berat',
        'kode_BPOM',
        'jumlah_beli'
    ];
    // Menghitung harga diskon jika mendekati tanggal kadaluarsa
    public function getDiscountedPriceAttribute()
    {
        $expiryThreshold = now()->addDays(7); // Batas produk yang mendekati kadaluarsa (3 hari)
        if ($this->expired <= $expiryThreshold) {
            return $this->harga * 0.65; // Diskon 35%
        }
        return $this->harga;
    }
}