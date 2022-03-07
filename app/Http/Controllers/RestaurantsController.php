<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Response;


class RestaurantsController extends Controller{

    public function index() : Response{
        $restaurants = Restaurant::with('restaurantImages')->get();

        $res = [];

        foreach ($restaurants as $restaurant){
            $res[] = [
                'restaurant' => [
                    'restaurant_data' => $restaurant,
                    'image' => $restaurant->restaurantImages()->first()
                ]
            ];
        }

        return response($res);
    }
}
