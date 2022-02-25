<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\FlashDeal;
use App\Models\Product;
use App\Models\ProductDiscount;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call(ShippingCostSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(FlashDealSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(MediaLibrarySeeder::class);
    }
}
