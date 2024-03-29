<?php

namespace App\Dto\Auth;

use App\Dto\BaseData;
use Illuminate\Http\Request;

class LoginData extends BaseData
{
    /**
     * Create a new DTO instance.
     */
    public function __construct(
        public string $email,
        public string $password,
        public bool $remember_me,
    ) {}

    /**
     * Create a new instance from request.
     */
    public static function fromRequest(Request $request): self
    {
        return new self(
            $request->input('email'),
            $request->input('password'),
            (bool) $request->input('remember_me')
        );
    }
}
