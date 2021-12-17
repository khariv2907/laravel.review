<?php


namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface UserRepositoryInterface
{
    /**
     * Get all.
     */
    public function all(): Collection;
}
