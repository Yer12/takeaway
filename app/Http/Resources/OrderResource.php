<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Models\Order;
use App\Services\DTO\Order\OrderDTO;
use JetBrains\PhpStorm\ArrayShape;

/**
 * class OrderResource.
 * @mixin OrderDTO
 */
final class OrderResource extends BaseResource
{
    /**
     * @return array
     */
    #[ArrayShape(['order_id' => "int", 'total' => "int", 'user_id' => "int", 'restaurant' => "\App\Models\Restaurant", 'order_detail' => "\Illuminate\Http\Resources\Json\AnonymousResourceCollection"])]
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
}
