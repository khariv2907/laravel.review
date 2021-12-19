<?php

namespace App\Dto\Profile;

use App\Dto\BaseData;
use Illuminate\Http\Request;

class UpdateProfileData extends BaseData
{
    public function __construct(
        public string $name,
        public string $email,
    ) {
    }
}
