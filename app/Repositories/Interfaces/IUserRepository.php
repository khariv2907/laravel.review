<?php

namespace App\Repositories\Interfaces;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface IUserRepository
{
    public function findOrFailById(int $id);
    
    public function all();
    
    public function store(array $data);
    
    public function update(int $id, array $data);
    
    public function updatePassword(int $id, string $password);
}
