<?php

namespace App\GraphQL\Queries\Article;

use App\Models\Article;
use App\Repositories\Interfaces\IArticleRepository;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class ArticleQuery extends Query
{
    public function __construct(
        private IArticleRepository $articleRepository
    ) {
    }
    
    /**
     * Query configuration.
     */
    protected $attributes = [
        'name' => 'article',
    ];

    /**
     * Type.
     */
    public function type(): Type
    {
        return GraphQL::type('Article');
    }

    /**
     * Arguments.
     */
    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int(),
                'rules' => ['required']
            ]
        ];
    }

    /**
     * Resolve query.
     * 
     * @param mixed $root
     */
    public function resolve($root, array $args): Article
    {
        return $this->articleRepository->findOrFailById($args['id']);
    }
}
