<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Services\Article\ArticleService;
use App\Services\Seo\SeoService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ArticleListController extends Controller
{
    /**
     * Create a new instance.
     */
    public function __construct(
        private SeoService $seoService,
        private ArticleService $articleService,
    ) {
    }
    
    /**
     * Show all articles.
     */
    public function __invoke(): Factory|View|Application
    {
        $pageTitle = $this->seoService->getTitleByInputString(__('seo.articles.index.title'));
        $articles = $this->articleService->getNewestPaginated();
        
        return view('web.frontend.articles.index', compact([
            'pageTitle',
            'articles',
        ]));
    }
}
