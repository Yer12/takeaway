<?php

namespace Tests\Unit;

use App\Http\Resources\ProductCategoriesResource;
use App\Http\Resources\RestaurantImagesResource;
use App\Models\ProductCategory;
use App\Models\RestaurantImage;
use Tests\TestCase;

class RestaurantImagesResourceTest extends TestCase
{
    public function testCorrectDataIsReturnedInResponse(): void
    {
        $restaurantImage = RestaurantImage::factory()->create(['restaurant_id' => 1]);
        $resource        = (new RestaurantImagesResource($restaurantImage))->jsonSerialize();

        $this->assertEquals([
            'image_id' => $restaurantImage->id,
            'url'      => $restaurantImage->image_url,
        ], $resource);
    }
}
