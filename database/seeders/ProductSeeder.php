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
            "bantal" => 'bantal.jpg'
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
