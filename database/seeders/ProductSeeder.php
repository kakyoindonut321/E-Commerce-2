<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $produk = array(
            "bola" => 'bola.jpg', 
            "bantal" => 'bantal.jpg',
            "balon" => 'balon.jpg',
            "sepatu" => 'sepatu.jpg',
            "jaket" => 'jaket.jpg',
            "topi" => 'topi.jpg',
            "buku" => 'buku.jpg',
            "lampu" => 'lampu.jpg',
        );

        $jumlah = count($produk);

        foreach ($produk as $p => $img) {
            \App\Models\Product::factory()->create([
                'name' => $p,
                'image' => $img
            ]);
        }
    }
}
