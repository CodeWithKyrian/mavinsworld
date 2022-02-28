<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ShippingCost>
 */
class ShippingCostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'group_name' => $this->faker->word(),
            'pickup_amount' => $this->faker->numberBetween(1000, 3000),
            'delivery_amount' => $this->faker->numberBetween(1000, 3000)
        ];
    }
    
}
