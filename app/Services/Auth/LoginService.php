<?php

namespace App\Services\Auth;

use App\Dto\Auth\LoginData;
use Illuminate\Support\Facades\Auth;

class LoginService
{
    public function loginUser(LoginData $loginData): bool
    {
        $credentials = [
            'email' => $loginData->email,
            'password' => $loginData->password,
        ];
        
        return Auth::attempt($credentials, $loginData->remember_me);
    }
}
