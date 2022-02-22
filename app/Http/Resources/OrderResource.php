<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Models\Order;
use JetBrains\PhpStorm\ArrayShape;

/**
 * class OrderResource.
 * @mixin Order
 */
final class OrderResource extends BaseResource
{
    /**
     * @return array
     */

    #[ArrayShape(['order_id' => "mixed", 'total' => "mixed", 'order_detail' => "mixed"])]
    public function getResponseArray(): array
    {
        return [
            'order_id' => $this->id,
            'total' => $this->total,
            'user_id' => $this->user_id,
            'restaurant' => $this->restaurant,
            'order_detail' => OrderDetailResource::collection($this->orderDetail),
        ];
    }

//    private function getTotalPrice(Collection $order, Collection $products)
//    {
//        $result = 0;
//
//        foreach ($order as $od) {
//            $result += $products->find($od->product_id)->price * $orderProduct->count;
//        }
//
//        return $result;
//    }
}
