<?php

declare(strict_types=1);

namespace App\Services\DTO\Authentication;

/**
 * Class RegisterDTO.
 */
final class RegisterDTO
{
    /**
     * @param string $name
     * @param string $email
     * @param string $password
     */
    public function __construct(
        public string $name,
        public string $email,
        public string $password
    ) {
    }
}
