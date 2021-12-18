<?php

namespace App\View\Components\Common\Alert;

use Illuminate\View\Component;

class MessageDismissible extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $alert,
        public string $message,
    ){
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.common.alert.message-dismissible');
    }
}
