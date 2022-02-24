<?php

declare(strict_types=1);

namespace App\Exceptions;

use JetBrains\PhpStorm\Pure;

/**
 * class InvalidTokenException.
 */
final class InvalidTokenException extends BaseException
{
    /**
     * @return static
     */
    #[Pure] public static function invalidToken(): self
    {
        return new self('Invalid token', ErrorCodes::UNPROCESSABLE_ENTITY);
    }
}
