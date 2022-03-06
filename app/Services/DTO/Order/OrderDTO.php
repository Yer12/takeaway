<?php

declare(strict_types=1);

namespace App\Services\DTO\Order;

use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Collection;

/**
 * class OrderDTO.
 */
final class OrderDTO
{
    /**
     * @param int $id
     * @param int $total
     * @param int $user_id
     * @param Restaurant $restaurant
     * @param Collection $orderDetail
     */
    public function __construct(
        public int $id,
        public int $total,
        public int $user_id,
        public Restaurant $restaurant,
        public Collection $orderDetail,
    ) {
    }
}
