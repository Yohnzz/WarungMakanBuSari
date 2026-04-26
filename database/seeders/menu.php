<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class menu extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Menu::create([
            'nama' => 'Nasi Goreng',
            'harga' => 15000,
            'kategori' => 'Makanan'
        ]);

        \App\Models\Menu::create([
            'nama' => 'Es Teh',
            'harga' => 5000,
            'kategori' => 'Minuman'
        ]);

         \App\Models\Menu::create([
            'nama' => 'Ayam Bakar',
            'harga' => 20000,
            'kategori' => 'Makanan'
        ]);

         \App\Models\Menu::create([
            'nama' => 'Jus Jeruk',
            'harga' => 8000,
            'kategori' => 'Minuman'
        ]);
        \App\Models\Menu::create([
            'nama' => 'Mie Goreng',
            'harga' => 12000,
            'kategori' => 'Makanan'
        ]);

         \App\Models\Menu::create([
            'nama' => 'Es Campur',
            'harga' => 10000,
            'kategori' => 'Minuman'
        ]);
    }
}
