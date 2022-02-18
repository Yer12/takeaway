<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Exceptions\AuthenticationException;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\LoginResource;
use App\Http\Resources\UserResource;
use App\Services\Handlers\Authentication\LoginHandler;
use App\Services\Handlers\Authentication\RegisterHandler;
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

    /**
     * @param RegisterRequest $request
     * @param RegisterHandler $handler
     * @return JsonResponse
     */
    public function register(RegisterRequest $request, RegisterHandler $handler): JsonResponse
    {
        $user = $handler->handle($request->getDto());

        return $this->response(
            'User created successfully',
            new UserResource($user)
        );
    }

    /**
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        auth()->logout();

        return $this->response(
            'User successfully signed out'
        );
    }


}
