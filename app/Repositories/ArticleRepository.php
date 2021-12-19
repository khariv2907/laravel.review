<?php


namespace App\Repositories;

use App\Models\Article;
use App\Models\User;
use App\Repositories\Interfaces\IArticleRepository;
use App\Repositories\Interfaces\IUserRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;

class ArticleRepository implements IArticleRepository
{
    /**
     * Find article by id.
     * 
     * @return Article
     */
    public function findOrFailById(int $id)
    {
        return Article::findOrFail($id);
    }
    /**
     * Get all articles.
     *
     * @return Article[]|Collection
     */
    public function all()
    {
        return Article::all();
    }

    /**
     * Store article.
     * 
     * @return Article
     */
    public function store(array $data)
    {
        return Article::create($data);
    }

    /**
     * Update article.
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
     * @return Paginator
     */
    public function paginated(int $perPage)
    {
        return Article::simplePaginate($perPage);
    }

    /**
     * @return Paginator
     */
    public function newestPaginated(int $perPage)
    {
        return Article::newest()->simplePaginate($perPage);
    }

    /**
     * @return Paginator
     */
    public function newestPaginatedByUserId(int $userId, int $perPage)
    {
        return Article::newest()
            ->whereUserId($userId)
            ->simplePaginate($perPage);
    }

    /**
     * @return bool|null
     */
    public function destroy(int $id)
    {
        return Article::whereId($id)->delete();
    }
}
