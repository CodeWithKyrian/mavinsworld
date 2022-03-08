<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'product_id' => Product::inRandomOrder()->first()->id,
            'display_name' => $this->faker->name(),
            'rating' => $this->faker->numberBetween(1, 5),
            'title' => $this->faker->words(6, true),
            'content' => $this->faker->paragraph(1),
            'status' => true
        ];
    }
}
