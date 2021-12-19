<?php

namespace App\Services\Article;

use App\Dto\Article\StoreArticleData;
use App\Dto\Article\UpdateArticleData;
use App\Models\Article;
use App\Repositories\Interfaces\IArticleRepository;
use Illuminate\Contracts\Pagination\Paginator;

class ArticleService
{
    private const PER_PAGE = 12;

    /**
     * Create a new instance.
     */
    public function __construct(
        private IArticleRepository $articleRepository
    ) {
    }

    /**
     * Get all with pagination.
     */
    public function getPaginated(): Paginator
    {
        return $this->articleRepository->paginated(self::PER_PAGE);
    }

    /**
     * Get all the newest with pagination.
     */
    public function getNewestPaginated(): Paginator
    {
        return $this->articleRepository->newestPaginated(self::PER_PAGE);
    }

    /**
     * Get all the newest with pagination.
     */
    public function getNewestPaginatedByUserId(int $userId): Paginator
    {
        return $this->articleRepository->newestPaginatedByUserId($userId, self::PER_PAGE);
    }

    /**
     * Find or fail by id.
     */
    public function findOrFailById(int $id): Article
    {
        return $this->articleRepository->findOrFailById($id);
    }

    /**
     * Store article by DTO.
     */
    public function storeByDataObject(StoreArticleData $data): Article
    {
        return $this->articleRepository->store($data->all());
    }

    /**
     * Update article by DTO.
     */
    public function updateByDataObject(int $id, UpdateArticleData $data): bool
    {
        return $this->articleRepository->update($id, $data->all());
    }

    /**
     * Delete article.
     */
    public function destroy(int $id): bool
    {
        return $this->articleRepository->destroy($id);
    }

    /**
     * Prepare article payload to store.
     */
    public function preparePayloadToStore(int $userId, array $data): array
    {
        return array_merge(
            $data, 
            ['user_id' => $userId]
        );
    }
}
