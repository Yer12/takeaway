<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\JsonResponse;

class RestaurantsController extends Controller{

    public function index() : JsonResponse{
        $restaurants = Restaurant::all();

        $res = [];

        foreach ($restaurants as $restaurant){
            $res[] = [
                'restaurant' => [
                    'restaurant_data' => $restaurant,
                    'image' => $restaurant->restaurantImages()->get()->first()
                ]
            ];
        }

        return response()->json($res);
    }
}
