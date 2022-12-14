<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => '',
            'image' => '',
            'price' => fake()->numberBetween(20, 1000000),
            'description' => fake()->paragraph(10),
            'category_id' => 0,
            'stock' => fake()->numberBetween(1,300),
            'sold' => fake()->numberBetween(1,200),
            'user' => 'febri'
        ];
    }
}
