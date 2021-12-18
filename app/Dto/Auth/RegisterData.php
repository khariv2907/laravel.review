<?php

namespace App\Dto\Auth;

use App\Dto\BaseData;
use Illuminate\Http\Request;

class RegisterData extends BaseData
{
    public function __construct(
        public string $email,
        public string $password,
    ) {
    }

    public static function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'confirmed', 'min:8', 'max:255'],
        ];
    }
}
