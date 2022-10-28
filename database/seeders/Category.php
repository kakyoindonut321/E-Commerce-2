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
        $category = array('Pakaian','Elektronik','Furnitur');
        
        foreach ($category as $c) {
            \App\Models\Category::factory()->create([
                'category' => $c,
            ]);
        }
    }
}
