<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\DeliveryAgency;
use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            'location' => fake()->address(),
            // 'destination_address' => fake()->streetAddress(),
            // 'destination_phone' => fake()->randomDigitNotZero(),
            'payment_status' => fake()->randomElement(['yes', 'no']),
            // 'price' => fake()->randomDigit(),
            'customer_id' => Customer::factory()->create()->id,
            'delivery_agency_id' => DeliveryAgency::factory()->create()->id,
            // 'item_id' => Item::all()->random()->id,
            'delivery_price' => fake()->randomFloat(2, 5, 500),
            'total_price' => fake()->randomFloat(2, 5, 500),
            'cost_total_price' => fake()->randomFloat(2, 5, 500),
            'discount' => fake()->randomFloat(2, 5, 500),
            'note' => fake()->text(),
        ];
    }
}
