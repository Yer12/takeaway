<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Models\OrderDetail;
use JetBrains\PhpStorm\ArrayShape;

/**
 * class OrderDetailResource.
 * @mixin OrderDetail
 */
final class OrderDetailResource extends BaseResource
{
    /**
     * @return array
     */
    #[ArrayShape(['id' => "int", 'quantity' => "int", 'product' => "mixed"])]
    public function getResponseArray(): array
    {
        return [
            'id' => $this->id,
            'quantity' => $this->quantity,
            'product' => $this->product,
        ];
    }
}
