<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\IUserRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class UserRepository extends BaseRepository implements IUserRepository
{
    /**
     * {@inheritdoc}
     */
    protected function builder(): Builder|User
    {
        return User::query();
    }

    /**
     * Update user's password.
     */
    public function updatePassword(int $id, string $password): bool
    {
        /** @var User $user */
        $user = $this->findOrFailById($id);

        $user->password = $password;

        return $user->update();
    }
}
