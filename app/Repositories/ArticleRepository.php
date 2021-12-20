<?php

namespace App\Repositories;

use App\Models\Article;
use App\Repositories\Interfaces\IArticleRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class ArticleRepository extends BaseRepository implements IArticleRepository
{
    /**
     * {@inheritdoc}
     */
    protected function builder(): Builder|Article
    {
        return Article::query();
    }

    /**
     * Get all the newest paginated articles.
     */
    public function newestPaginated(int $perPage): Paginator
    {
        return $this
            ->builder()
            ->latest()
            ->simplePaginate($perPage);
    }

    /**
     * Get all the newest paginated articles by user id.
     */
    public function newestPaginatedByUserId(int $userId, int $perPage): Paginator
    {
        return $this
            ->builder()
            ->latest()
            ->whereUserId($userId)
            ->simplePaginate($perPage);
    }
}
