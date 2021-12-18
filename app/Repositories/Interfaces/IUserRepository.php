<?php


namespace App\Repositories\Interfaces;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface IUserRepository
{
    public function all();
    
    public function store(array $data);
}
