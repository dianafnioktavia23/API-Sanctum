<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kategori::factory()->create([
                'nama_kategori' => 'Makanan',
                'image' => 'image1',
                'keterangan' => 'Kategori untuk makanan',
            ]);
        
        
    }
}
