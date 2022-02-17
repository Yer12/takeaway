<?php

declare(strict_types=1);

namespace App\Exceptions;

use JetBrains\PhpStorm\Pure;

/**
 * Class AuthenticationException.
 */
final class AuthenticationException extends BaseException
{
    /**
     * @return static
     */
    #[Pure] public static function incorrectCredentials(): self
    {
        return new self('Incorrect email or password', ErrorCodes::UNAUTHORIZED);
    }
}
