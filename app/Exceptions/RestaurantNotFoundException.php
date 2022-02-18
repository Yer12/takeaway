<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;
use \Illuminate\Http\JsonResponse;

class RestaurantNotFoundException extends Exception
{
    /**
     * @param  Request     $request
     * @return JsonResponse
     */
    public function render(Request $request): JsonResponse
    {
        return response()->json([
            'message'    => $this->getMessage(),
            'error_code' => $this->getCode(),
        ]);
    }
}
