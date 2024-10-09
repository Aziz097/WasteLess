<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'id' => random_int(1000, 9999),
            'name' => 'Produk A',
            'price' => 100000,
            'expiry_date' => now()->addDays(5),
            'supermarket_id' => 1234, // Sesuaikan dengan supermarket ID
        ]);
    }
}

