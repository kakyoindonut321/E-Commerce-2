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
            "bola" => 'bola.jfif', 
            "baju" => 'baju.jfif',
            "garpu" => 'garpu.jfif',
            "gelas" => 'gelas.jfif',
            "jaket" => 'jaket.jfif',
            "celana" => 'celana.jfif',
            "hoodie" => 'hoodie.jfif',
            "iphone" => 'iphone.jfif',
            "alat-renang" => 'alat-renang.jfif',
            "kacamata" => 'kacamata.jfif',
            "kenalpot" => 'kenalpot.jfif',
            "playstation" => 'playstation.jfif',
            "raket" => 'raket.jfif',
            "ram" => 'ram.jfif',
            "sendok" => 'sendok.jfif',
            "sepatu" => 'sepatu.jfif',
            "speaker" => 'speaker.jfif',
            "spion" => 'spion.jfif',
            "tas" => 'tas.jfif',
            "vga" => 'vga.jfif'
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
