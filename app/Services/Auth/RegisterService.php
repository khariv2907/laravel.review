<?php

namespace App\Services\Auth;

use App\Dto\Auth\RegisterData;
use App\Models\User;
use App\Repositories\Interfaces\IUserRepository;

class RegisterService
{
    /**
     * Create a new instance.
     */
    public function __construct(
        private IUserRepository $userRepository
    ) {
    }

    /**
     * Register a user.
     */
    public function registerByDataObject(RegisterData $registerData): User
    {
        return $this->userRepository->store($registerData->all());
    }

}
