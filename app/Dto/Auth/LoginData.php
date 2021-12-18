<?php

namespace App\Dto\Auth;

use App\Dto\BaseData;
use Illuminate\Http\Request;

class LoginData extends BaseData
{
    public function __construct(
        public string $email,
        public string $password,
        public bool $remember_me,
    ) {
    }

    public static function fromRequest(Request $request): self
    {
        return new self(
            $request->input('email'), 
            $request->input('password'),
            (bool) $request->input('remember_me')
        );
    }
    
    public static function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'max:255'],
            'remember_me' => ['boolean'],
        ];
    }
}
