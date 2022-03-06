<?php

namespace Controller;

use Facade\FlareClient\Http\Response;
use Tests\TestCase;

class RestaurantControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_restaurants_show() : void
    {
        $response = $this->json('GET', 'api/restaurants');
        $response->assertStatus(200);
    }
}
