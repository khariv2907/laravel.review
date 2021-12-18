<?php

namespace App\Services\Auth;

use App\Dto\Auth\RegisterData;
use App\Repositories\Interfaces\IUserRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class RegisterService
{
    public function __construct(
        private IUserRepository $userRepository
    ){
    }

    /**
     * Register a user.
     */
    public function registerFromDataObject(RegisterData $registerData)
    {
        return $this->userRepository->store($registerData->all());
    }

}
