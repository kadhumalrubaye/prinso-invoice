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
            'customer_id' => Customer::all()->random()->id,
            'delivery_agency_id' => DeliveryAgency::all()->random()->id,
            'item_id' => Item::all()->random()->id,
            'delivery_price' => fake()->randomDigit(10),
            'total_price' => fake()->randomDigit(10),
            'discount' => fake()->randomDigit(10),
            'note' => fake()->text(),
        ];
    }
}
