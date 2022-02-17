<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Exceptions\ErrorCodes;
use App\Exceptions\HttpException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class BaseRequest.
 */
abstract class BaseRequest extends FormRequest
{
    /**
     * @return array
     */
    abstract public function rules(): array;

    /**
     * @return bool
     */
    abstract public function authorize(): bool;

    /**
     * Handle a failed validation attempt.
     *
     * @param Validator $validator
     * @return void
     * @throws HttpException
     */
    protected function failedValidation(Validator $validator)
    {
        $errors = implode(', ', $validator->errors()->all());

        throw new HttpException($errors, ErrorCodes::UNPROCESSABLE_ENTITY);
    }
}
