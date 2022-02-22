<?php

declare(strict_types=1);

namespace App\Services\DTO\Order;

use App\Models\Order;

/**
 * class OrderCreateDTO
 * @mixin Order
 */
final class OrderCreateDTO
{
    /**
     * @param int $user_id
     * @param int $restaurant_id
     * @param int $total
     */
    public function __construct(
        public int $user_id,
        public int $restaurant_id,
        public int $total,
    ) {
    }
}
