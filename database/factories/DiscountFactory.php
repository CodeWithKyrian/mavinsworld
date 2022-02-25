<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FlashDeal>
 */
class DiscountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => Product::inRandomOrder()->first()->id,
            'value' => $this->faker->numberBetween(10, 30),
            'type' => 'percent',
            'started_at' => now(),
            'ended_at' => now()->addWeek()
        ];
    }
}
