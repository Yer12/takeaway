<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\JsonResponse;

class RestaurantsController extends Controller{

    public function index() : JsonResponse{
        $restaurants = Restaurant::all();

        $res = [];

        $inc = 1;
        foreach ($restaurants as $restaurant){
            $res[] = [
                'restaurant_'.$inc => [
                    'restaurant_data' => $restaurant,
                    'image' => $restaurant->restaurantImages()->get()->first()
                ]
            ];
            $inc+=1;
        }

        return response()->json($res);
    }
}
