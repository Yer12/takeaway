<?php

declare(strict_types=1);

namespace App\Services\Handlers\Order;

use App\Models\Order;
use App\Services\DTO\Order\OrderDTO;
use JetBrains\PhpStorm\Pure;


/**
 * class ShowOrderHandler.
 */
final class ShowOrderHandler
{
    /**
     * @param int $id
     * @return OrderDTO
     */
    public function handle(int $id): OrderDTO
    {
        /** @var Order $order */
        $order = Order::with('restaurant', 'user', 'orderDetails')->find($id);

        return $this->getOrderDTO($order);
    }

    /**
     * @param Order $order
     * @return OrderDTO
     */
    #[Pure]
    private function getOrderDTO(Order $order): OrderDTO
    {
        return new OrderDTO(
            id: $order->id,
            total: $order->total,
            user_id: $order->user_id,
            restaurant: $order->restaurant,
            orderDetail: $order->orderDetails,
        );
    }
}
