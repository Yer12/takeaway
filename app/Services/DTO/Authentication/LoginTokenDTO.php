<?php

declare(strict_types=1);

namespace App\Services\DTO\Authentication;

/**
 * Class LoginTokenDTO.
 */
final class LoginTokenDTO
{
    /**
     * @param string $accessToken
     * @param string $tokenType
     * @param int $expiresIn
     */
    public function __construct(
        public string $accessToken,
        public string $tokenType,
        public int $expiresIn,
    ) {
    }
}
