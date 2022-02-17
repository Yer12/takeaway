<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Exceptions\AuthenticationException;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\LoginResource;
use App\Services\Handlers\Authentication\LoginHandler;
use Illuminate\Http\JsonResponse;

/**
 * Class AuthController.
 */
final class AuthController extends Controller
{
    /**
     * @param LoginRequest $request
     * @param LoginHandler $handler
     * @return JsonResponse
     * @throws AuthenticationException
     */
    public function login(LoginRequest $request, LoginHandler $handler): JsonResponse
    {
        $loginTokenDTO = $handler->handle($request->getDto());

        return $this->response(
            'User is logged in',
            new LoginResource($loginTokenDTO)
        );
    }
}
