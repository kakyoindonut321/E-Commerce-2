<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Category extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = array(
            'Elektronik' => 'group 1.png',
            'Hp & aksesori' => 'group 2.png',
            'Komputer & aksesori' => 'group 3.png', 
            "Pakaian laki-laki" => 'group 4.png', 
            "Pakaian perempuan" => 'group 5.png', 
            "Tas laki-laki" => 'group 6.png', 
            "Tas perempuan" => 'group 7.png', 
            "Sepatu laki-laki" => 'group 8.png', 
            "Tas perempuan" => 'group 9.png',
            "Otomotif" => 'group 10.png',
            "peralatan olahraga" => 'group 11.png',
            "peralatan rumah tangga" => 'group 12.png'
        );
        
        foreach ($category as $c => $img) {
            \App\Models\Category::factory()->create([
                'category' => $c,
                'image' => $img,
            ]);
        }
    }
}
