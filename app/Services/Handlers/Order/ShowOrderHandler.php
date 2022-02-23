<?php

declare(strict_types=1);

namespace App\Services\Handlers\Order;

use App\Models\Order;
use App\Models\OrderDetail;
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
        $order = Order::with('restaurant', 'user')->where('id', $id)->first();
        $orderDetails = OrderDetail::with('product')->where('order_id', $order->id)->get();

        return $this->getOrderDTO($order, $orderDetails);
    }

    /**
     * @param $order
     * @param $orderDetails
     * @return OrderDTO
     */
    #[Pure]
    private function getOrderDTO($order, $orderDetails): OrderDTO
    {
        return new OrderDTO(
            id: $order->id,
            total: $order->total,
            user_id: $order->user_id,
            restaurant: $order->restaurant(),
            orderDetail: $orderDetails,
        );
    }
}
