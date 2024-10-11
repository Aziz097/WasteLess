<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    // Definisikan tabel yang digunakan oleh model ini
    protected $table = 'carts';

    // Field yang dapat diisi (mass assignable)
    protected $fillable = [
        'product_name',
        'product_id',
        'quantity',
        'price',
    ];

    // Relasi dengan model Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
