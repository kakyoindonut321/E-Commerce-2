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
            'price' => fake()->numberBetween(20, 300),
            'description' => fake()->paragraph,
            'stock' => fake()->numberBetween(1,200)
        ];
    }
}
