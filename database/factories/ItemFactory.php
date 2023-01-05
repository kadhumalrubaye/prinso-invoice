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
            'item_num' => fake()->randomDigit(10),
            'quantity' => fake()->randomDigit(10),
            'price' => fake()->randomDigit(10),
            // 'single_price' => fake()->randomDigit(),

            'original_price' => fake()->randomDigit(10),


        ];
    }
}
