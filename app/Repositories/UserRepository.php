<?php


namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\IUserRepository;
use Illuminate\Database\Eloquent\Collection;

class UserRepository implements IUserRepository
{
    /**
     * Get all users.
     *
     * @return User[]|Collection
     */
    public function all()
    {
        return User::all();
    }

    /**
     * Store user.
     * 
     * @return User
     */
    public function store(array $data)
    {
        return User::create($data);
    }
}
