<?php

namespace App\Providers;

use App\Faker\FoodImageProvider;
use App\Faker\RestaurantProvider;
use Faker\Factory;
use Faker\Generator;
use FakerRestaurant\Provider\en_US\Restaurant;
use Illuminate\Support\ServiceProvider;

class FakerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Generator::class, function () {
            $faker = Factory::create();
            $faker->addProvider(new RestaurantProvider($faker));
            $faker->addProvider(new Restaurant($faker));
            $faker->addProvider(new FoodImageProvider($faker));
            return $faker;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
