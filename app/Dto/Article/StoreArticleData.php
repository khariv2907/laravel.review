<?php

namespace App\Dto\Article;

use App\Dto\BaseData;

class StoreArticleData extends BaseData
{
    /**
     * Create a new DTO instance.
     */
    public function __construct(
        public int $user_id,
        public string $title,
        public string $content,
    ) {
    }
}
