<?php

namespace Database\Seeders;

use App\Models\FlashDeal;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FlashDealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FlashDeal::factory(1)->hasAttached(
            Product::inRandomOrder()->limit(6)->get(),
            ['discount' => random_int(20, 40), 'discount_type' => 'percent']
        )->create();
    }
}
