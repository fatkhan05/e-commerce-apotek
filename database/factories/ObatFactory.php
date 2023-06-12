<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Obat>
 */
class ObatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'kode_obat' => $this->faker->randomNumber(3),
            'nama_obat' => $this->faker->word,
            'satuan_obat' => $this->faker->name,
            'harga_obat' => $this->faker->randomNumber(4),
            'stock_obat' => $this->faker->numberBetween(1, 100),
        ];
    }
}
