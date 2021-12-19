<?php


namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\IUserRepository;
use Illuminate\Database\Eloquent\Collection;

class UserRepository implements IUserRepository
{
    /**
     * Find user by id.
     * 
     * @return User
     */
    public function findOrFailById(int $id)
    {
        return User::findOrFail($id);
    }
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

    /**
     * Update user.
     *
     * @return bool
     */
    public function update(int $id, array $data)
    {
        $user = $this->findOrFailById($id);
        
        $user->fill($data);
        
        return $user->update();
    }

    /**
     * Update user's password.
     *
     * @return bool
     */
    public function updatePassword(int $id, string $password)
    {
        $user = $this->findOrFailById($id);

        $user->password = $password;

        return $user->update();
    }
}
