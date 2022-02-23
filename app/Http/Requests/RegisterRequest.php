<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Services\DTO\Authentication\RegisterDTO;
use Illuminate\Support\Arr;
use JetBrains\PhpStorm\ArrayShape;

/**
 * Class RegisterRequest.
 */
final class RegisterRequest extends BaseRequest
{

    /**
     * @return array
     */
    #[ArrayShape(['email' => "string", 'password' => "string"])]
    public function rules(): array
    {
        return [
            'email' => 'required|email:rfc,dns|unique:users',
            'password' => 'required|string|min:6|max:50'
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
     * @return RegisterDTO
     */
    public function getDto(): RegisterDTO
    {
        $validated = $this->validated();

        return new RegisterDTO(
            email: Arr::get($validated, 'email'),
            password: Arr::get($validated, 'password')
        );
    }
}
