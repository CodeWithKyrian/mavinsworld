<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderDetail>
 */
class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => $this->faker->randomElement(range(1, 10)),
            'quantity' => 1,
            'unit_price' => $this->faker->numberBetween(10000, 20000),
            'total_price' => $this->faker->numberBetween(10000, 100000),
        ];
    }
}
