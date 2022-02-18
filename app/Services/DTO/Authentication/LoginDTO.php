<?php

declare(strict_types=1);

namespace App\Services\DTO\Authentication;

/**
 * Class LoginDTO.
 */
final class LoginDTO
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
