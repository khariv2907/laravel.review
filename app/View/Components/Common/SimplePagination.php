<?php

namespace App\View\Components\Common;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SimplePagination extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public Paginator $paginator,
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|string|\Closure
    {
        return view('components.common.simple-pagination');
    }
}
