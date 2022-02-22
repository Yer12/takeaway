<?php

declare(strict_types=1);

namespace App\Services\DTO\Order;


use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * class OrderDTO.
 */
final class OrderDTO
{
    /**
     * @param int $id
     * @param int $total
     * @param int $user_id
     * @param BelongsTo $restaurant
     * @param Collection $orderDetail
     */
    public function __construct(
        public int $id,
        public int $total,
        public int $user_id,
        public mixed $restaurant,
        public Collection $orderDetail,
    ) {
    }
}
