<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Services\Article\ArticleService;
use App\Services\Seo\SeoService;
use Illuminate\Http\Request;

class ShowArticleController extends Controller
{
    /**
     * Show article.
     */
    public function __invoke(ArticleService $articleService, SeoService $seoService, int $id)
    {
        $article = $articleService->findOrFailById($id);
        $pageTitle = $seoService->getTitleByInputString($article->title);
        
        return view('web.frontend.articles.show', compact([
            'article',
            'pageTitle',
        ]));
    }
}
