<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Restaurant;
use FakerRestaurant\Provider\en_US\Restaurant as RestaurantFaker;

class ProductCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $this->faker->addProvider(new RestaurantFaker($this->faker));

        return [
            'restaurant_id' => Restaurant::inRandomOrder()->first()->id,
            'name'          => $this->faker->foodName(),
            'updated_at'    => $this->faker->dateTime(),
            'created_at'    => $this->faker->dateTime(),
        ];
    }
}
