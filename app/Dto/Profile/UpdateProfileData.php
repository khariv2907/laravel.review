<?php

namespace App\Dto\Profile;

use App\Dto\BaseData;

class UpdateProfileData extends BaseData
{
    /**
     * Create a new DTO instance.
     */
    public function __construct(
        public string $name,
        public string $email,
    ) {
    }
}
