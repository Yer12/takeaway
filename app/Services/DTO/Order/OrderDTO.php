<?php

declare(strict_types=1);

namespace App\Services\DTO\Order;

use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Restaurant;

final class OrderDTO
{
    /**
     * @param $
     */
    public function __construct(
        public int $id,
        public int $total_price,
    ){
    }
}
