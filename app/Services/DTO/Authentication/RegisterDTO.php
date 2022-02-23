<?php

declare(strict_types=1);

namespace App\Services\DTO\Authentication;

/**
 * Class RegisterDTO.
 */
final class RegisterDTO
{
    /**
     * @param string $email
     * @param string $password
     */
    public function __construct(
        public string $email,
        public string $password
    ) {
    }
}
