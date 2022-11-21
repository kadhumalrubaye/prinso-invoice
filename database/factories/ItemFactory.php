<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'price' => fake()->randomDigit(),
            'name' => fake()->name(),
            'item_num' => fake()->randomDigit(),
            'quantity' => fake()->randomDigit(),
            'price' => fake()->randomDigit(),
            // 'single_price' => fake()->randomDigit(),
            'total_price' => fake()->randomDigit(),
            'original_price' => fake()->randomDigit(),
            'original_totla_price' => fake()->randomDigit(),
            'discount' => fake()->randomDigit(),
        ];
    }
}
