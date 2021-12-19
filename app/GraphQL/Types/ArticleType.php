<?php

namespace App\GraphQL\Types;

use App\Models\Article;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class ArticleType extends GraphQLType
{
    /**
     * Type configuration.
     */
    protected $attributes = [
        'name' => 'Article',
        'description' => 'Collection of articles',
        'model' => Article::class
    ];

    /**
     * Fields.
     */
    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'ID of article',
            ],
            'title' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Title of the article',
            ],
            'content' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Content of the article',
            ],
        ];
    }
}
