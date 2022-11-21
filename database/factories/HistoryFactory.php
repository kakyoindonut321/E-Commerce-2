<?php

namespace Database\Factories;
use Carbon\Carbon;


use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\History>
 */
class HistoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $amount = fake()->numberBetween(1, 100);
        $price = fake()->numberBetween(1000, 1000000);
        $total = $amount * $price;

        return [
            'user_id' => fake()->numberBetween(1, 7),
            'product_id' => fake()->numberBetween(1, 50),
            'price' => $price,
            'total' => $total,
            'amount' => $amount,
            'date' => fake()->dateTimeBetween(Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()),
            'status' => 'accepted',
        ];
    }
}
