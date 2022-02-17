<?php

declare(strict_types=1);

namespace App\Exceptions;

use Exception;
use JetBrains\PhpStorm\Pure;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

/**
 * Class BaseException.
 */
abstract class BaseException extends Exception
{
    /**
     * @param string $message
     * @param int $httpCode
     * @param Throwable|null $previous
     */
    #[Pure] public function __construct(string $message = "", int $httpCode = Response::HTTP_BAD_REQUEST, Throwable $previous = null)
    {
        parent::__construct($message, $httpCode, $previous);
    }
}
