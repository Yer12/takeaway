<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Arrayable;
use JsonSerializable;

class MenuResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request): array|Arrayable|JsonSerializable
    {
        return [
            'restaurant_id'      => $this->id,
            'restaurant_name'    => $this->name,
            'location'           => $this->location,
            'restaurant_images'  => RestaurantImagesResource::collection($this->whenLoaded('restaurantImages')),
            'product_categories' => ProductCategoriesResource::collection($this->whenLoaded('productCategories')),
        ];
    }
}
