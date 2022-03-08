<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Restaurant;

class ProductCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'restaurant_id' => Restaurant::inRandomOrder()->first()->id,
            'name'          => $this->faker->foodName(),
            'updated_at'    => $this->faker->dateTime(),
            'created_at'    => $this->faker->dateTime(),
        ];
    }
}
