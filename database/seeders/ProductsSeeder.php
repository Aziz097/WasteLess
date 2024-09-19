<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Products; 

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Products::factory()->create([
            'nama' => 'Product 1',
            'deskripsi' => 'Deskripsi 1',
            'variasi' => 'Variasi 1',
            'harga' => 10000,
            'diskon' => 0,
            'stok' => 10,
            'masa_simpan' => '1 tahun',
            'expired' => now(),
            'berat' => 1,
            'kode_BPOM' => 1234
        ]);
    }
}
