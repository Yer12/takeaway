<?php

declare(strict_types=1);

namespace App\Services\Handlers\Order;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Services\DTO\Order\OrderCreateDTO;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

/**
 * class CreateOrderHandler.
 */
final class CreateOrderHandler
{
    /**
     * @param OrderCreateDTO $dto
     * @return void
     */
    public function handle(OrderCreateDTO $dto): void
    {
        DB::transaction(function () use ($dto) {
            /** @var Order $order */
            $order = Order::create([
                'user_id' => $dto->userId,
                'restaurant_id' => $dto->restaurantId,
                'total' => $this->getTotalPrice($dto->products),
            ]);

            $this->createOrderDetail($order, $dto->products);
        });
    }

    /**
     * @param array $products
     * @return float
     */
    private function getTotalPrice(array $products): float
    {
        $result = 0;

        $mappedProducts = [];
        $productsIds = [];

        foreach($products as $product) {
            $mappedProducts[$product['id']] = $product['quantity'];
            $productsIds[] = $product['id'];
        }

        /** @var Collection $products */
        $products = Product::select(['id', 'price'])
            ->whereIn('id', $productsIds)
            ->get();

        $products->each(function (Product $product) use ($mappedProducts, &$result) {
            $result = $product->price * $mappedProducts[$product->id];
        });

        return (float) $result;
    }

    /**
     * @param Order $order
     * @param array $products
     * @return void
     */
    private function createOrderDetail(Order $order, array $products)
    {
        foreach ($products as $product)
        {
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $product['id'],
                'quantity' => $product['quantity'],
            ]);
        }
    }
}
