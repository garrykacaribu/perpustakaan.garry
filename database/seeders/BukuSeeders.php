<?php

namespace Database\Seeders;

use App\Models\Buku;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BukuSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        buku::factory(10)->create();
    }
}
