<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inventori>
 */
class InventoriFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_barang' => fake()->sentence(2),
            'harga_barang' => fake()->randomNumber(5),
            'stok' => fake()->randomNumber(3),
            'keterangan' => 'belum dibayar',
        ];
    }
}
