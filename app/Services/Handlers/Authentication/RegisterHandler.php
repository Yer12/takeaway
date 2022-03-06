<?php

declare(strict_types=1);

namespace App\Services\Handlers\Authentication;

use App\Exceptions\AuthenticationException;
use App\Models\User;
use App\Services\DTO\Authentication\RegisterDTO;
use Illuminate\Http\JsonResponse;

/**
 * Class RegisterHandler.
 */
final class RegisterHandler
{
    /**
     * @param RegisterDTO $dto
     * @return User
     */
    public function handle(RegisterDTO $dto): User
    {
        return User::create([
            'email' => $dto->email,
            'password' => bcrypt($dto->password)
        ]);
    }
}
