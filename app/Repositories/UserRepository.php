<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\IUserRepository;
use Illuminate\Database\Eloquent\Collection;

class UserRepository extends BaseRepository implements IUserRepository
{
    /**
     * Find user by id.
     */
    public function findOrFailById(int $id): User
    {
        return User::findOrFail($id);
    }
    /**
     * Get all users.
     */
    public function all(): Collection|array
    {
        return User::all();
    }

    /**
     * Store user.
     */
    public function store(array $data): User
    {
        return User::create($data);
    }

    /**
     * Update user.
     */
    public function update(int $id, array $data): bool
    {
        $user = $this->findOrFailById($id);

        $user->fill($data);

        return $user->update();
    }

    /**
     * Update user's password.
     */
    public function updatePassword(int $id, string $password): bool
    {
        $user = $this->findOrFailById($id);

        $user->password = $password;

        return $user->update();
    }
}
