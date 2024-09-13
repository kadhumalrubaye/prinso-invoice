<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Invoice;
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
            'price' => fake()->randomFloat(2, 5, 500),
            'item_name' => fake()->name(),
            // 'item_num' => fake()->randomDigit(10),
            'quantity' => fake()->randomDigit(10),
            'price' => fake()->randomDigit(10),
            // 'single_price' => fake()->randomDigit(),

            'original_price' => fake()->randomFloat(2, 5, 500),
            
            'invoice_id'=>Invoice::factory()->create()->id,

        ];
    }
}
