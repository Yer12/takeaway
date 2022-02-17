<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use App\Models\RestaurantImage;
use Illuminate\Database\Seeder;

class RestaurantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Restaurant::factory()
            ->has(RestaurantImage::factory()
            ->count(5), 'restaurantImages')
            ->count(10)->create();
    }
}
