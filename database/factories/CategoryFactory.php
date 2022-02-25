<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
             'name' => $this->faker->words(2, true),
             'slug' => $this->faker->slug(2),
             'meta_title' => $this->faker->text,
             'meta_description' => $this->faker->sentences(4, true),
             'banner' => '/img/banner.png',
             'icon' => '/img/icon.png',
             'is_featured' => $this->faker->boolean(25)
        ];
    }
}
