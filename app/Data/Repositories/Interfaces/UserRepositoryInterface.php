<?php


namespace App\Data\Repositories\Interfaces;

use App\Data\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface UserRepositoryInterface
{
    /**
     * Get all.
     */
    public function all(): Collection;
}
