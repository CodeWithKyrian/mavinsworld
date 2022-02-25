<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FlashDeal>
 */
class FlashDealFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(20),
            'slug' => $this->faker->slug,
            'status' => $this->faker->boolean(85),
            'started_at' => $this->faker->dateTimeBetween(now(), now()->addDays(3)),
            'ended_at' => $this->faker->dateTimeBetween(now()->addDays(3), now()->addWeek()),
        ];
    }
}
