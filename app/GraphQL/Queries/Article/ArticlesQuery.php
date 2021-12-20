<?php

namespace App\GraphQL\Queries\Article;

use App\Models\Article;
use App\Repositories\Interfaces\IArticleRepository;
use GraphQL\Type\Definition\Type;
use Illuminate\Database\Eloquent\Collection;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class ArticlesQuery extends Query
{
    /**
     * Create a new instance.
     */
    public function __construct(
        private IArticleRepository $articleRepository,
    ) {}

    /**
     * Query configuration.
     */
    protected $attributes = [
        'name' => 'articles',
    ];

    /**
     * Type.
     */
    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Article'));
    }

    /**
     * Resolve query.
     *
     * @param mixed $root
     */
    public function resolve($root, array $args): Collection|array
    {
        return $this->articleRepository->all();
    }
}
