<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ProductCategory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_category_id' => ProductCategory::inRandomOrder()->first()->id,
            'name'                => $this->faker->foodName(),
            'price'               => $this->faker->numberBetween($min = 10, $max = 25000),
            'description'         => $this->faker->text($maxNbChars = 200),
            'image'               => $this->faker->foodImage(),
            'updated_at'          => $this->faker->dateTime(),
            'created_at'          => $this->faker->dateTime(),
        ];
    }
}
