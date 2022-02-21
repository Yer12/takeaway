<?php

namespace Tests\Unit;

use App\Http\Resources\MenuResource;
use App\Models\Restaurant;
use Tests\TestCase;

class MenuResourceTest extends TestCase
{
    public function testCorrectDataIsReturnedInResponse(): void
    {
        $restaurant = Restaurant::factory()->create();
        $resource   = (new MenuResource($restaurant))->jsonSerialize();

        $this->assertEquals([
            'restaurant_id'   => $restaurant->id,
            'restaurant_name' => $restaurant->name,
            'location'        => $restaurant->location,
        ], $resource);
    }
}
