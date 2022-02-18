<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Services\DTO\Authentication\LoginDTO;
use Illuminate\Support\Arr;
use JetBrains\PhpStorm\ArrayShape;

/**
 * Class LoginRequest.
 */
final class LoginRequest extends BaseRequest
{
    /**
     * @return array
     */
    #[ArrayShape(['name' => "string", 'email' => "string", 'password' => "string"])]
    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'password' => 'required|string|min:6|max:50',
        ];
    }

    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return LoginDTO
     */
    public function getDto(): LoginDTO
    {
        $validated = $this->validated();

        return new LoginDTO(
            email: Arr::get($validated, 'email'),
            password: Arr::get($validated, 'password')
        );
    }
}
