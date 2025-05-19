<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Buku>
 */
class BukuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'judul' => fake()->word(2, 4),
            'penulis' => fake()->name(),
            'penerbit' => fake()->word(3, 5),
            'tahun_terbit' => fake()->year(),
            'isbn' => fake()->randomDigit(12),
            'ringkasan' => fake()->paragraph(1, 2),
            'halaman' => fake()->randomDigit(1, 2),
            'genre' => fake()->word(1, 2),
        ];
    }
}
