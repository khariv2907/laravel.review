<?php

namespace App\Services\Profile;

use App\Dto\Profile\UpdatePasswordData;
use App\Dto\Profile\UpdateProfileData;
use App\Repositories\Interfaces\IUserRepository;

class ProfileService
{
    /**
     * Create a new instance.
     */
    public function __construct(
        private IUserRepository $userRepository,
    ) {}

    /**
     * Update user profile by DTO.
     */
    public function updateByDataObject(int $userId, UpdateProfileData $data): bool
    {
        return $this->userRepository->update($userId, $data->all());
    }

    /**
     * Update user password by DTO.
     */
    public function updatePasswordByDataObject(int $userId, UpdatePasswordData $data): bool
    {
        return $this->userRepository->updatePassword($userId, $data->password);
    }
}
