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
            "Aksesori laki-laki" => 'group 6.png', 
            "Aksesori perempuan" => 'group 7.png', 
            "Otomotif" => 'group 10.png',
            "peralatan olahraga" => 'group 11.png',
            "peralatan rumah tangga" => 'group 12.png',
            "peralatan sekolah" => 'group 13.png', 
            "Lainnya" => 'group 14.png'
        );
        
        foreach ($category as $c => $img) {
            \App\Models\Category::factory()->create([
                'category' => $c,
                'image' => $img,
            ]);
        }
    }
}
