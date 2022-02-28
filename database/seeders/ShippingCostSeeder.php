<?php

namespace Database\Seeders;

use App\Models\ShippingCost;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShippingCostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        ShippingCost::factory()->count(3)->create();
    }
}
