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
    #[ArrayShape(['name' => "mixed", 'email' => "mixed"])]
    public function getResponseArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email
        ];
    }
}
