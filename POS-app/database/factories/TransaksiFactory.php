<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaksi>
 */
class TransaksiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_barang' => fake()->numberBetween(1,5),
            'id_user' => 2,
            'jumlah_pembelian' => fake()->numberBetween(10,100),
            'keterangan' => 'belum dibayar',
        ];
    }
}
