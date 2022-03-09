<?php

declare(strict_types=1);

namespace App\Services\DTO\Order;

/**
 * class OrderCreateDTO
 */
final class OrderCreateDTO
{
    /**
     * @param int $userId
     * @param int $restaurantId
     * @param array $products
     */
    public function __construct(
        public int $userId,
        public int $restaurantId,
        public array $products,
    ) {
    }
}
