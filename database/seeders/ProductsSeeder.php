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
        Products::firstOrCreate(
            ['nama' => 'Fathan Kurniawan'],
            [
            'deskripsi' => 'Manusia',
            'variasi' => 'Orang',
            'harga' => 10000,
            'diskon' => 0,
            'stok' => 1,
            'masa_simpan' => '30 hari',
            'expired' => now(),
            'berat' => 1,
            'kode_BPOM' => 3441
        ]);

        Products::firstOrCreate(
            ['kode_BPOM' => 3315],
            [
                'nama' => 'Rahmat Aldi',
                'deskripsi' => 'Manusia',
                'variasi' => 'Orang',
                'harga' => 120000,
                'diskon' => 0,
                'stok' => 1,
                'masa_simpan' => '3 bulan',
                'expired' => now(),
                'berat' => 2,
                'jumlah_beli' => 10
            ]
        );
    }
}
