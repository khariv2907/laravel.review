<?php

namespace App\View\Components\Common\Alert;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MessageDismissible extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $alert,
        public string $message,
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.common.alert.message-dismissible');
    }
}
