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
            "vga" => 'vga.jfif',
            "bantal" => 'bantal.png',
            "custom casing HP" => 'custom casing HP.jpg',
            "crayon joyko" => 'crayon joyko.jpg',
            "gitar akustik" => 'gitar akustik.jpg',
            "handgrip 60kg" => 'handgrip 60kg.jpg',
            "handgrip motor" => 'handgrip motor.jpg',
            "helm" => 'helm.jpg',
            "kabel data iphone" => 'kabel data iphone.png',
            "kabel data type C" => 'kabel data type C.jpg',
            "kabel HDMI" => 'kabel HDMI.jpg',
            "karpet bulu" => 'karpet bulu.jpg',
            "kepala charger" => 'kepala charger.png',
            "kulkas" => 'kulkas.jpg',
            "laptop lenovo legion" => 'laptop lenovo legion.jpg',
            "masker" => 'masker.jpg',
            "meja mini" => 'meja mini.jpg',
            "mesin bor" => 'mesin bor.jpg',
            "mesin potong kayu" => 'mesin potong kayu.jpg',
            "mouse pad" => 'mouse pad.jpg',
            "mouse" => 'mouse.jpg',
            "pensil warna" => 'pensil warna.jpg',
            "pompa galon air" => 'pompa galon air.jpg',
            "power bank" => 'power bank.png',
            "pulpen pilot" => 'pulpen pilot.jpg',
            "rak tv" => 'rak tv.jpg',
            "router modem" => 'router modem.jpg',
            "sarung tangan motor" => 'sarung tangan motor.jpg',
            "Topi" => 'Topi.png',
            "tripod" => 'tripod.jpg',
            "VR 3D" => 'VR 3D.jpg',
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
