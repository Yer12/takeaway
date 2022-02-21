<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
use App\Services\Handlers\Order\ShowHandler;
use Illuminate\Http\JsonResponse;


final class OrderController extends Controller
{
    public function index(int $id, ShowHandler $handler): JsonResponse
    {
        $order = $handler->handle($id);

        return $this->response(
            new OrderResource($order)
        );

        //return response()->json($order);
    }
}
