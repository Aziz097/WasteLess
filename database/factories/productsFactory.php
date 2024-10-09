<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Products;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\products>
 */
class productsFactory extends Factory
{
    protected $model = Products::class;

    public function definition()
    {
        return [
            'nama' => $this->faker->word,
            'deskripsi' => $this->faker->sentence,
            'variasi' => $this->faker->word,
            'harga' => $this->faker->numberBetween(1000, 100000),
            'diskon' => $this->faker->numberBetween(0, 100),
            'stok' => $this->faker->numberBetween(1, 100),
            'masa_simpan' => $this->faker->word,
            'expired' => $this->faker->date,
            'berat' => $this->faker->randomFloat(2, 0.1, 10),
            'kode_BPOM' => $this->faker->numberBetween(1000, 9999),
        ];
    }
}
