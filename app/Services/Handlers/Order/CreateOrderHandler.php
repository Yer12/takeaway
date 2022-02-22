<?php

declare(strict_types=1);

namespace App\Services\Handlers\Order;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Services\DTO\Order\OrderCreateDTO;

/**
 * class CreateOrderHandler.
 */
final class CreateOrderHandler
{
    /**
     * @param OrderCreateDTO $dto
     * @return mixed
     */
    public function handle(OrderCreateDTO $dto): mixed
    {
        return Order::create([
            'user_id' => $dto->user_id,
            'restaurant_id' => $dto->restaurant_id,
            'total' => $dto->total
        ]);
    }

}

