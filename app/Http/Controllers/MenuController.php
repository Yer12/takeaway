<?php

namespace App\Http\Controllers;

use App\Exceptions\RestaurantNotFoundException;
use Illuminate\Http\JsonResponse;
use App\Models\Restaurant;
use App\Models\ProductCategory;

final class MenuController extends Controller
{
    /**
     * Возвращает данные заведения и его меню
     *
     * @param  int $id
     * @return JsonResponse
     * @throws RestaurantNotFoundException
     */
    public function show(int $id): JsonResponse
    {
        if (!Restaurant::where('id', $id)->exists()) {
            throw new RestaurantNotFoundException("Restaurant with id {$id} is not found", 404);
        }

        $restaurant        = Restaurant::find($id);
        $products          = [];
        $productCategories = $restaurant->productCategories()->get();

        foreach ($productCategories as $category) {
            $products[$category->name] = ProductCategory::find($category->id)->products()->get();
        }

        $menu = [
            'restaurant' => [
                'restaurant_info'   => $restaurant,
                'restaurant_images' => $restaurant->restaurantImages()->get(),
            ],
            'products'   => $products,
        ];

        return response()->json($menu);
    }
}
