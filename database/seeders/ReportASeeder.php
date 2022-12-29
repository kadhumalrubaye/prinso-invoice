<?php

namespace Database\Seeders;

use App\Models\ReportA;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReportASeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ReportA::factory()->count(50)->create();
    }
}
