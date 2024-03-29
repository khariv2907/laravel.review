<?php

namespace App\View\Components\Common;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardBody extends Component
{
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|string|Closure
    {
        return view('components.common.card-body');
    }
}
