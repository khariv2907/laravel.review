<?php

namespace App\Dto\Auth;

use App\Dto\BaseData;

class RegisterData extends BaseData
{
    /**
     * Create a new DTO instance.
     */
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
    ) {}
}
