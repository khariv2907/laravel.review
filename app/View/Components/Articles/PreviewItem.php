<?php

namespace App\View\Components\Articles;

use App\Models\Article;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PreviewItem extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public Article $article,
        public bool $isEditable = false,
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|string|Closure
    {
        return view('components.articles.preview-item');
    }
}
