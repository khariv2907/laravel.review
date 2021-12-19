<?php

namespace App\Http\Controllers\Account\Articles;

use App\Dto\Article\StoreArticleData;
use App\Dto\Article\UpdateArticleData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Article\StoreArticleRequest;
use App\Http\Requests\Article\UpdateArticleRequest;
use App\Services\Article\ArticleService;
use App\Services\Seo\SeoService;
use App\Traits\HasRedirectWithMessage;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ArticleResourceController extends Controller
{
    use HasRedirectWithMessage;
    
    public function __construct(
        private ArticleService $articleService,
        private SeoService $seoService,
    ){
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): Factory|View|Application
    {
        $pageTitle = $this->seoService->getTitleByInputString(__('seo.account.articles.index.title'));
        $articles = $this->articleService->getPaginated();
        
        return view('web.frontend.account.articles.index', compact([
            'pageTitle',
            'articles',
        ]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Factory|View|Application
    {
        $pageTitle = $this->seoService->getTitleByInputString(__('seo.account.articles.create.title'));
        
        return view('web.frontend.account.articles.create', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request): RedirectResponse
    {
        $payload = $this->articleService->preparePayloadToStore(Auth::id(), $request->validated());
        $data = StoreArticleData::from($payload);
        
        $isCreated = $this->articleService->storeByDataObject($data);
        
        if (! $isCreated) {
            return $this->backWithError(__('message.update.failed'));
        }

        return $this->backWithSuccess(__('message.update.success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): Factory|View|Application
    {
        $article = $this->articleService->findOrFailById($id);
        $pageTitle = $this->seoService->getTitleByInputString($article->title);
        
        return view('web.frontend.account.articles.show', compact([
            'article', 
            'pageTitle',
        ]));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id): Factory|View|Application
    {
        $article = $this->articleService->findOrFailById($id);
        $pageTitle = $this->seoService->getTitleByInputString($article->title);

        return view('web.frontend.account.articles.edit', compact([
            'article',
            'pageTitle',
        ]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, int $id): RedirectResponse
    {
        /** @var UpdateArticleData $data */
        $data = $request->getData();
        
        $isUpdated = $this->articleService->updateByDataObject($id, $data);
        
        if (! $isUpdated) {
            return $this->backWithError(__('message.update.failed'));
        }

        return $this->backWithSuccess(__('message.update.success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): RedirectResponse
    {
        $isDeleted = $this->articleService->destroy($id);
        
        if (! $isDeleted) {
            return $this->backWithError(__('message.update.failed'));
        }

        return $this->backWithSuccess(__('message.update.success'));
    }
}
