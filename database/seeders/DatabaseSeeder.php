<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\DeliveryAgency;
use App\Models\Invoice;
use App\Models\ReportA;
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
        \App\Models\User::factory(10)->create();
        // \App\Models\Invoice::factory(10)->create();
        // \App\Models\Invoice::factory(10)->create();
        $this->call(ItemSeeder::class);
        $this->call(DeliveryAgencySeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(InvoiceSeeder::class);
        $this->call(ReportASeeder::class);


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
