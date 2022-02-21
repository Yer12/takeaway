<?php

namespace App\Http\Controllers;

use App\Exceptions\RestaurantNotFoundException;
use App\Http\Resources\MenuResource;
use App\Models\Restaurant;

final class MenuController extends Controller
{
    /**
     * Возвращает данные заведения и его меню
     *
     * @param  int $id
     * @return MenuResource
     * @throws RestaurantNotFoundException
     */
    public function show(int $id): MenuResource
    {
        if (!Restaurant::where('id', $id)->exists()) {
            throw new RestaurantNotFoundException("Restaurant with id {$id} is not found", 404);
        }

        return new MenuResource(Restaurant::with(['restaurantImages', 'productCategories.products'])->find($id));
    }
}
