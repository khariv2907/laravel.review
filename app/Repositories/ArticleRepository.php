<?php

namespace App\Repositories;

use App\Models\Article;
use App\Repositories\Interfaces\IArticleRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;

class ArticleRepository implements IArticleRepository
{
    /**
     * Find article by id.
     */
    public function findOrFailById(int $id): Article
    {
        return Article::findOrFail($id);
    }
    
    /**
     * Get all articles.
     */
    public function all(): Collection|array
    {
        return Article::all();
    }

    /**
     * Store article.
     */
    public function store(array $data): Article
    {
        return Article::create($data);
    }

    /**
     * Update article.
     */
    public function update(int $id, array $data): bool
    {
        $user = $this->findOrFailById($id);
        
        $user->fill($data);
        
        return $user->update();
    }

    /**
     * Get all paginated articles.
     */
    public function paginated(int $perPage): Paginator
    {
        return Article::simplePaginate($perPage);
    }

    /**
     * Get all the newest paginated articles.
     */
    public function newestPaginated(int $perPage): Paginator
    {
        return Article::newest()->simplePaginate($perPage);
    }

    /**
     * Get all the newest paginated articles by user id.
     */
    public function newestPaginatedByUserId(int $userId, int $perPage): Paginator
    {
        return Article::newest()
            ->whereUserId($userId)
            ->simplePaginate($perPage);
    }

    /**
     * Delete article.
     */
    public function destroy(int $id): bool
    {
        return Article::whereId($id)->delete();
    }
}
