<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\JsonResponse;

class RestaurantsController extends Controller{

    public function index() : JsonResponse{
        $restaurants = Restaurant::all();

        return response()->json($restaurants);
    }
}
