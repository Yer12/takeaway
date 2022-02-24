<?php

declare(strict_types=1);

namespace App\Services\Handlers\Authentication;

use App\Exceptions\AuthenticationException;
use App\Services\DTO\Authentication\LoginDTO;
use App\Services\DTO\Authentication\LoginTokenDTO;

/**
 * Class LoginHandler.
 */
final class LoginHandler
{
    private const TOKEN_TYPE = 'bearer';
    private const TOKEN_EXPIRES_TIME_UNIT = 1440;

    /**
     * @param LoginDTO $dto
     * @return LoginTokenDTO
     * @throws AuthenticationException
     */
    public function handle(LoginDTO $dto): LoginTokenDTO
    {
        if (! $token = $this->isCredentialsValid($dto->email, $dto->password)) {
            throw AuthenticationException::incorrectCredentials();
        }

        return $this->getToken($token);
    }

    /**
     * @param string $email
     * @param string $password
     * @return bool|string
     */
    private function isCredentialsValid(string $email, string $password): bool|string
    {
        return auth()->attempt([
            'email' => $email,
            'password' => $password,
        ]);
    }

    /**
     * @param string $token
     * @return LoginTokenDTO
     */
    private function getToken(string $token): LoginTokenDTO
    {
        return new LoginTokenDTO(
            accessToken: $token,
            tokenType: self::TOKEN_TYPE,
            expiresIn: auth()->factory()->getTTL() * self::TOKEN_EXPIRES_TIME_UNIT,
        );
    }
}
