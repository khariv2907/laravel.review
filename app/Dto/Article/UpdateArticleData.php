<?php

namespace App\Dto\Article;

use App\Dto\BaseData;

class UpdateArticleData extends BaseData
{
    /**
     * Create a new DTO instance.
     */
    public function __construct(
        public string $title,
        public string $content,
    ) {}
}
