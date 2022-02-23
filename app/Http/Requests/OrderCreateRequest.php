<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Services\DTO\Order\OrderCreateDTO;
use Illuminate\Support\Arr;
use JetBrains\PhpStorm\ArrayShape;

/**
 * class OrderCreateRequest.
 */
final class OrderCreateRequest extends BaseRequest
{
    /**
     * @return array
     */
    #[ArrayShape(['user_id' => "string", 'restaurant_id' => "string", 'total' => "string"])]
    public function rules(): array
    {
        return [
            'user_id' => 'integer',
            'restaurant_id' => 'integer',
            'total' => 'integer',
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

        return new OrderCreateDTO(
            user_id: Arr::get($validated, 'user_id'),
            restaurant_id: Arr::get($validated, 'restaurant_id'),
            total: Arr::get($validated, 'total')
        );
    }
}
