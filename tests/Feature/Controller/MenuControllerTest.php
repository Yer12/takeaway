<?php

namespace Tests\Feature\Controller;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class MenuControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testMenuShow(): void
    {
        $response = $this->json('GET', route('menu.show', ['id' => 1]));
        $response->assertStatus(Response::HTTP_OK);
    }

    public function testMenuIfRestaurantIdIsWrong(): void
    {
        $response = $this->json('GET', route('menu.show', ['id' => 999]));
        $response->assertJsonFragment([
            'message'    => 'Restaurant with id 999 is not found',
            'error_code' => 404
        ]);
    }
}
