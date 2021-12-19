<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Services\Article\ArticleService;
use App\Services\Seo\SeoService;
use Illuminate\Http\Request;

class ArticleListController extends Controller
{
    /**
     * Show all articles.
     */
    public function __invoke(ArticleService $articleService, SeoService $seoService)
    {
        $pageTitle = $seoService->getTitleByInputString(__('seo.articles.index.title'));
        $articles = $articleService->getNewestPaginated();
        
        return view('web.frontend.articles.index', compact([
            'pageTitle',
            'articles',
        ]));
    }
}
