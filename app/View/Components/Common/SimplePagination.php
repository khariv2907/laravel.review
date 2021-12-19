<?php

namespace App\View\Components\Common;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\View\Component;

class SimplePagination extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public Paginator $paginator
    ){
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.common.simple-pagination');
    }
}
