<?php

namespace App\View\Composers;

use Illuminate\View\View;

abstract class ViewComposer
{
    /**
     * Bind data to the view.
     */
    abstract public function compose(View $view): void;
}
