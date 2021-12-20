<?php

namespace App\Repositories;

use App\Models\Article;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    /**
     * Get builder.
     */
    abstract protected function builder(): Builder|Model;

    /**
     * Find model by id.
     */
    public function findOrFailById(int $id): Model
    {
        return $this
            ->builder()
            ->findOrFail($id);
    }

    /**
     * Get all models.
     */
    public function all(): Collection|array
    {
        return $this
            ->builder()
            ->all();
    }

    /**
     * Store model.
     */
    public function store(array $data): Model
    {
        return $this
            ->builder()
            ->create($data);
    }

    /**
     * Update model.
     */
    public function update(int $id, array $data): bool
    {
        $user = $this->findOrFailById($id);

        $user->fill($data);

        return $user->update();
    }

    /**
     * Get all paginated models.
     */
    public function paginated(int $perPage): Paginator
    {
        return $this
            ->builder()
            ->simplePaginate($perPage);
    }

    /**
     * Delete model.
     */
    public function destroy(int $id): bool
    {
        return $this
            ->builder()
            ->where('id', $id)
            ->delete();
    }
}
