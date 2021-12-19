<?php

namespace App\Dto\Article;

use App\Dto\BaseData;
use Illuminate\Http\Request;

class StoreArticleData extends BaseData
{
    public function __construct(
        public int $user_id,
        public string $title,
        public string $content,
    ) {
    }
}
