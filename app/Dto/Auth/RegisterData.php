<?php

namespace App\Dto\Auth;

use App\Dto\BaseData;
use Illuminate\Http\Request;

class RegisterData extends BaseData
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
    ) {
    }
}
