<?php

namespace App\Dto\Profile;

use App\Dto\BaseData;

class UpdatePasswordData extends BaseData
{
    /**
     * Create a new DTO instance.
     */
    public function __construct(
        public string $password,
    ) {}
}
