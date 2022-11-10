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
            'Elektronik',
            'Hp & aksesori',
            'Komputer & aksesori', 
            "Pakaian laki-laki", 
            "Pakaian perempuan", 
            "Tas laki-laki", 
            "Tas perempuan", 
            "Sepatu laki-laki", 
            "Tas perempuan",
            "Otomotif",
            "peralatan olahraga",
            "peralatan rumah tangga"
        );
        
        foreach ($category as $c) {
            \App\Models\Category::factory()->create([
                'category' => $c,
            ]);
        }
    }
}
