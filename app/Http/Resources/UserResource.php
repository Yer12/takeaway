<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Models\User;
use JetBrains\PhpStorm\ArrayShape;

/**
 * Class UserResource.
 * @mixin User
 */
final class UserResource extends BaseResource
{
    /**
     * @return array
     */
    #[ArrayShape(['email' => "string"])]
    public function getResponseArray(): array
    {
        return [
            'email' => $this->email
        ];
    }
}
