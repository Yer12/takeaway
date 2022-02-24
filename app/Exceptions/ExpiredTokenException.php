<?php

declare(strict_types=1);

namespace App\Exceptions;

use JetBrains\PhpStorm\Pure;

/**
 * class ExpiredTokenException.
 */
final class ExpiredTokenException extends BaseException
{
    /**
     * @return static
     */
    #[Pure] public static function tokenExpired(): self
    {
        return new self('Token is expired', ErrorCodes::UNPROCESSABLE_ENTITY);
    }
}
