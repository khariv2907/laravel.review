<?php

namespace App\Dto\Profile;

use App\Dto\BaseData;
use Illuminate\Http\Request;

class UpdatePasswordData extends BaseData
{
    public function __construct(
        public string $password,
    ) {
    }
}
