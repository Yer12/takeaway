<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Services\DTO\Authentication\LoginTokenDTO;
use JetBrains\PhpStorm\ArrayShape;

/**
 * Class LoginResource.
 * @mixin LoginTokenDTO
 */
final class LoginResource extends BaseResource
{
    /**
     * @return array
     */
    #[ArrayShape(['access_token' => "string", 'token_type' => "string", 'expires_in' => "int", 'user' => "\App\Http\Resources\UserResource"])]
    public function getResponseArray(): array
    {
        return [
            'access_token' => $this->accessToken,
            'token_type' => $this->tokenType,
            'expires_in' => $this->expiresIn,
            'user' => new UserResource($this->user),
        ];
    }
}
