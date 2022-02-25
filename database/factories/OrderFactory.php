<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => Str::random(10),
            'user_id' => $this->faker->randomElement(range(1, 10)),
            'sub_total' => $this->faker->numberBetween(10000, 100000),
            'grand_total' => $this->faker->numberBetween(10000, 100000),
            'shipping_fee' => $this->faker->numberBetween(1000, 3000),
            'shipping_method' => $this->faker->randomElement(['pickup', 'delivery']),
            'paid_at' => $this->faker->randomElement([now(), null]),
            'ordered_at' => now(),
        ];
    }
}
