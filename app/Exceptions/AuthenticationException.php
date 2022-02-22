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

    /**
     * @return static
     */
    #[Pure] public static function tokenExpired(): self
    {
        return new self('Token is expired', ErrorCodes::UNPROCESSABLE_ENTITY);
    }

    /**
     * @return static
     */
    #[Pure] public static function invalidToken(): self
    {
        return new self('Invalid token', ErrorCodes::UNPROCESSABLE_ENTITY);
    }

    #[Pure] public static function TokenNotFound(): self
    {
        return new self('Authorization Token not found', ErrorCodes::UNPROCESSABLE_ENTITY);
    }
}
