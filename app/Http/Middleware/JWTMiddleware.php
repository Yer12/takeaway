<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Exceptions\AuthenticationException;
use App\Exceptions\ExpiredTokenException;
use App\Exceptions\InvalidTokenException;
use Closure;
use Illuminate\Http\Request;
use Throwable;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

/**
 * class JWTMiddleware.
 */
final class JWTMiddleware extends BaseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     * @throws AuthenticationException
     * @throws InvalidTokenException
     * @throws ExpiredTokenException
     */
    public function handle(Request $request, Closure $next): mixed
    {
        try {
            JWTAuth::parseToken()->authenticate();
        } catch (TokenInvalidException){
            throw InvalidTokenException::invalidToken();
        } catch (TokenExpiredException){
            throw ExpiredTokenException::tokenExpired();
        } catch (Throwable){
            throw AuthenticationException::TokenNotFound();
        }
        return $next($request);
    }
}
