<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(class: ProductSeeder::class);
        $this->call(class: Category::class);
        \App\Models\User::factory(10)->create();

        // \App\Models\User::factory(10)->create();


        // admin
        \App\Models\User::factory()->create([
            'name' => 'febri',
            'email' => 'febri@gmail.com',
            'privilege' => 'admin',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'profile_image' => ''
        ]);

        //penjual
        // \App\Models\User::factory()->create([
        //     'name' => 'taufik',
        //     'email' => 'taufik@gmail.com',
        //     'privilege' => 'seller',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
        // ]);

        //user
        \App\Models\User::factory()->create([
            'name' => 'hannan',
            'email' => 'hannan@gmail.com',
            'privilege' => '',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'profile_image' => ''
        ]);

        \App\Models\History::factory(20)->create();

    }
}
