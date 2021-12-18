<?php

namespace App\View\Composers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AppLayoutComposer extends ViewComposer
{
    /**
     * {@inheritdoc}
     */
    public function compose(View $view): void
    {
        $view->with([
            'user' => Auth::user(),
            'lang' => $this->getLang()
        ]);
    }

    /**
     * Get lang html attribute.
     */
    private function getLang(): string
    {
        return str_replace('_', '-', app()->getLocale());
    }
}
