<?php

namespace App\Services\Auth;

use App\Dto\Auth\LoginData;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginService
{
    /**
     * Login from data object.
     */
    public function loginByDataObject(LoginData $loginData): bool
    {
        $credentials = [
            'email' => $loginData->email,
            'password' => $loginData->password,
        ];
        
        return Auth::attempt($credentials, $loginData->remember_me);
    }

    /**
     * Login by user model.
     */
    public function loginByUser(User $user): void
    {
        Auth::login($user);
    }
}
