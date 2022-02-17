<?php

declare(strict_types=1);

namespace App\Services\DTO\Authentication;

use Illuminate\Contracts\Auth\Authenticatable;

/**
 * Class LoginTokenDTO.
 */
final class LoginTokenDTO
{
    /**
     * @param string $accessToken
     * @param string $tokenType
     * @param int $expiresIn
     * @param Authenticatable $user
     */
    public function __construct(
        public string $accessToken,
        public string $tokenType,
        public int $expiresIn,
        public Authenticatable $user,
    ) {
    }
}
