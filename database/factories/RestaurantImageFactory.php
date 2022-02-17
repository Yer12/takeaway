<?php

namespace Database\Factories;

use App\Models\RestaurantImage;
use Illuminate\Database\Eloquent\Factories\Factory;

class RestaurantImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = RestaurantImage::class;

    public function definition()
    {
        return [
            'image_url' => $this->faker->imageUrl
        ];
    }
}
