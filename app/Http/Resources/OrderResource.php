<?php

declare(strict_types=1);

namespace App\Http\Resources;


use JetBrains\PhpStorm\ArrayShape;

final class OrderResource extends BaseResource
{

    #[ArrayShape(['id' => "mixed", 'total_price' => "mixed"])]
    public function getResponseArray(): array
    {
        return [
            'id' => $this->id,
            'total_price' => $this->total_price,
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
