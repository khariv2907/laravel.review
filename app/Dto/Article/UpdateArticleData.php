<?php

namespace App\Dto\Article;

use App\Dto\BaseData;
use Illuminate\Http\Request;

class UpdateArticleData extends BaseData
{
    public function __construct(
        public string $title,
        public string $content,
    ) {
    }
}
