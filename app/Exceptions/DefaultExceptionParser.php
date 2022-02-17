<?php

declare(strict_types=1);

namespace App\Exceptions;

use App\Services\Traits\ResponseTrait;
use Closure;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Validation\ValidationException;
use JetBrains\PhpStorm\Pure;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

/**
 * Class DefaultExceptionParser.
 */
final class DefaultExceptionParser
{
    use ResponseTrait;

    #[Pure]
    public static function make(): self
    {
        return new self();
    }

    /**
     * @return Closure
     */
    public function renderable(): Closure
    {
        return fn (Throwable $exception, $request): JsonResponse => $this->render($exception, $request);
    }

    /**
     * Handle the exception.
     *
     * @param $request
     * @param Throwable $e
     * @param Request
     * @return JsonResponse
     */
    public function render(Throwable $e, $request): JsonResponse
    {
        $errorCode = $e->getCode();

        if (! in_array($errorCode, ErrorCodes::CODES)) {
            $errorCode = Response::HTTP_BAD_REQUEST;
        }

        switch (true) {
            case $e instanceof ModelNotFoundException:
                return $this->errorResponse('Record not found', ErrorCodes::NOT_FOUND);
            case $e instanceof NotFoundHttpException:
                return $this->errorResponse('Not found', ErrorCodes::NOT_FOUND);
            case $e instanceof ValidationException:
                /** @var Validator $validator */
                $validator = $e->validator;

                return $this->errorResponse(implode(', ', $validator->messages()->all()), ErrorCodes::UNPROCESSABLE_ENTITY);
            default:
                if (App::isProduction()) {
                    return $this->errorResponse('Server error', ErrorCodes::SERVER_ERROR);
                }

                return $this->errorResponse($e->getMessage(), $errorCode);
        }
    }
}
