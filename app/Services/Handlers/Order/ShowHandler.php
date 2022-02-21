<?php

declare(strict_types=1);

namespace App\Services\Handlers\Order;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Restaurant;
use App\Services\DTO\Order\OrderDTO;
use JetBrains\PhpStorm\Pure;


/**
 * class ShowHandler.
 */
final class ShowHandler
{
    /**
     * @return array
     */
    public function handle(int $id)
    {
        $orders = Order::with('restaurants', 'users')->where('id', $id)->first();
//        $orderDetails = OrderDetail::with('products')->get();
        //return $this->getArray($orders, $orderDetails);
        return $this->getOrderDTO($orders);
    }

    /**
     * @param array $orders
     * @param array $orderDetails
     * @return array
     */
//    private function getArray($orders, $orderDetails): array
//    {

//        $res = [];
//        foreach ($orders as $order)
//        {
//            foreach ($orderDetails as $orderDetail)
//            {
//                $res[] = [
//                    'order' => $order,
//                    'order_details' => $orderDetail,
//                ];
//            }
//        }
//        return $this->getOrderDTO($res);
//        return $res;
//    }

    private function getOrderDTO($orders): OrderDTO
    {
        return new OrderDTO(
            id: $orders->id,
            total_price: $orders->total,
        );
    }
}
