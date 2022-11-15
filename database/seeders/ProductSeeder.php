<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public $rt;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $produk = array(
            'bola.jfif' => '9', 
            'baju.jfif' => '4',
            'garpu.jfif' => '10',
            'gelas.jfif' => '10',
            'jaket.jfif' => '4',
            'celana.jfif' => '4',
            'hoodie.jfif' => '5',
            'iphone.jfif' => '6',
            'alat-renang.jfif' => '12',
            'kacamata.jfif' => '6',
            'kenalpot.jfif' => '8',
            'playstation.jfif' => '3',
            'raket.jfif' => '9',
            'ram.jfif' => '3',
            'sendok.jfif' => '10',
            'sepatu.jfif' => '6',
            'speaker.jfif' => '1',
            'spion.jfif' => '8',
            'tas.jfif' => '6',
            'vga.jfif' => '3',
            'bantal.png' => '10',
            'custom casing HP.jpg' => '2',
            'crayon joyko.jpg' => '11',
            'gitar akustik.jpg' => '12',
            'handgrip 60kg.jpg' => '9',
            'handgrip motor.jpg' => '8',
            'helm.jpg' => '8',
            'kabel data iphone.png' => '2',
            'kabel data type C.jpg' => '2',
            'kabel HDMI.jpg' => '3',
            'karpet bulu.jpg' => '10',
            'kepala charger.png' => '2',
            'kulkas.jpg' => '1',
            'laptop lenovo legion.jpg' => '3',
            'masker.jpg' => '7',
            'meja mini.jpg' => '10',
            'mesin bor.jpg' => '12',
            'mesin potong kayu.jpg' => '12',
            'mouse pad.jpg' => '3',
            'mouse.jpg' => '3',
            'pensil warna.jpg' => '11',
            'pompa galon air.jpg' => '10',
            'power bank.png' => '2',
            'pulpen pilot.jpg' => '11',
            'rak tv.jpg' => '10',
            'router modem.jpg' => '1',
            'sarung tangan motor.jpg' => '8',
            'Topi.png' => '6',
            'tripod.jpg' => '2',
            'VR 3D.jpg' => '3'
        );

        $jumlah = count($produk);

        foreach ($produk as $img => $cat) {
            $rt = substr($img , 0, -4);
            \App\Models\Product::factory()->create([
                'name' => rtrim($rt, "."),
                'category_id' => $cat,
                'image' => "image/produk/" . $img
            ]);
        }
    }
}
