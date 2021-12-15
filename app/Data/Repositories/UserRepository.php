<?php


namespace App\Data\Repositories;

use App\Data\Repositories\Interfaces\UserRepositoryInterface;
use App\Data\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserRepository implements UserRepositoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function all(): Collection
    {
        return User::all();
    }
}
