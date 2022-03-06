<?php

declare(strict_types=1);

namespace App\Http\Resources;

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
    #[ArrayShape(['order' => "\Illuminate\Database\Eloquent\Collection"])]
    public function getResponseArray(): array
    {
        return [
            'order' => $this->order,
        ];
    }
}
