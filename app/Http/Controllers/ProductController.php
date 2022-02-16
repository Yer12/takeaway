<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Models\Restaurant;
use App\Models\ProductCategory;

class ProductController extends Controller
{
    /**
     * Возвращает продукты по категориям для определенного заведения
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse {
        if (!Restaurant::where('id', $id)->exists()) {
            abort(404, "Restaurant with id {$id} is not found");
        }

        $products   = [];
        $categories = Restaurant::find($id)->productCategories()->get();

        foreach ($categories as $category) {
            $products[$category->name] = ProductCategory::find($category->id)->products()->get();
        }

        return response()->json($products);
    }
}
