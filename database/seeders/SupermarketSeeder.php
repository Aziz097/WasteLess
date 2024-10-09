<?php

namespace Database\Seeders;

use App\Models\Supermarket;
use Illuminate\Database\Seeder;

class SupermarketSeeder extends Seeder
{
    public function run()
    {
        Supermarket::create([
            'id' => random_int(1000, 9999),
            'name' => 'Supermarket A',
            'latitude' => -6.2088,
            'longitude' => 106.8456
        ]);
    }
}

