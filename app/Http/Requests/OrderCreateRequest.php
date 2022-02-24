<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Models\User;
use App\Services\DTO\Order\OrderCreateDTO;
use Illuminate\Support\Arr;
use JetBrains\PhpStorm\ArrayShape;

/**
 * class OrderCreateRequest.
 */
final class     OrderCreateRequest extends BaseRequest
{
    /**
     * @return array
     */
    #[ArrayShape(['restaurant_id' => "string", 'products' => "string", 'products.*.id' => "string", 'products.*.quantity' => "string"])]
    public function rules(): array
    {
        return [
            'restaurant_id' => 'required|integer|exists:restaurants,id',
            'products' => 'required|array',
            'products.*.id' => 'required|integer|exists:products,id',
            'products.*.quantity' => 'required|integer',
        ];
    }

    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return OrderCreateDTO
     */
    public function getDto(): OrderCreateDTO
    {
        $validated = $this->validated();

        /** @var User $user */
        $user = $this->user();

        return new OrderCreateDTO(
            userId: $user->id,
            restaurantId: Arr::get($validated, 'restaurant_id'),
            products: Arr::get($validated, 'products')
        );
    }
}
