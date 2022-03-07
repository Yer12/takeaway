<?php

declare(strict_types=1);

namespace App\Services\DTO\Order;

use Illuminate\Database\Eloquent\Collection;

/**
 * class OrderDTO.
 */
final class OrderDTO
{
    /**
     * @param Collection $order
     */
    public function __construct(
        public Collection $order,
    ) {
    }
}
