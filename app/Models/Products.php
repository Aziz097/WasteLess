<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Products extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $incrementing = false; // Menghentikan auto-increment
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
        'kode_BPOM'
    ];

    // Override fungsi boot
    protected static function boot()
    {
        parent::boot();

        // Event yang terjadi sebelum data disimpan ke database
        static::creating(function ($model) {
            // Generate random 4 digit integer dan pastikan unik
            do {
                $id = random_int(1000, 9999);
            } while (Products::where('id', $id)->exists());

            $model->id = $id;
        });
    }
}