<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\OrderCreateRequest;
use App\Http\Resources\OrderResource;
use App\Services\Handlers\Order\CreateOrderHandler;
use App\Services\Handlers\Order\ShowOrderHandler;
use Illuminate\Http\JsonResponse;

/**
 * class OrderController.
 */

// Request -> DTO -> Controller -> Handler -> DTO -> Resource -> Response

final class OrderController extends Controller
{
    /**
     * @param int $id
     * @param ShowOrderHandler $handler
     * @return JsonResponse
     */
    public function index(int $id, ShowOrderHandler $handler): JsonResponse
    {
        $orderDTO = $handler->handle($id);

        return $this->response(
            'List of customer orders',
            new OrderResource($orderDTO)
        );
    }

    /**
     * @param OrderCreateRequest $request
     * @param CreateOrderHandler $handler
     * @return JsonResponse
     */
    public function createOrder(OrderCreateRequest $request, CreateOrderHandler $handler): JsonResponse
    {
        $handler->handle($request->getDto());

        return $this->response('Order created successfully!');
    }
}
