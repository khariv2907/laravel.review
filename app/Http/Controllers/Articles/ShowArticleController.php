<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Services\Article\ArticleService;
use App\Services\Seo\SeoService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ShowArticleController extends Controller
{
    /**
     * Create a new instance.
     */
    public function __construct(
        private SeoService $seoService,
        private ArticleService $articleService,
    ) {}

    /**
     * Show article.
     */
    public function __invoke(int $id): Factory|View|Application
    {
        $article = $this->articleService->findOrFailById($id);
        $pageTitle = $this->seoService->getTitleByInputString($article->title);

        return view('web.frontend.articles.show', compact([
            'article',
            'pageTitle',
        ]));
    }
}
