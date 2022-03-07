<?php

declare(strict_types=1);

namespace App\Services\Handlers\Order;

use App\Models\Order;
use App\Services\DTO\Order\OrderDTO;
use Illuminate\Database\Eloquent\Collection;
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
        $order = Order::with('restaurant', 'user', 'orderDetails')->where('user_id', $id)->get();

        return $this->getOrderDTO($order);
    }

    /**
     * @param Order $order
     * @return OrderDTO
     */
    #[Pure]
    private function getOrderDTO(Collection $order): OrderDTO
    {
        return new OrderDTO(
            order: $order,
        );
    }
}
