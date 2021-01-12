<?php

namespace Breath\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{

    public $message;

    public $type;

    public $icon;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($message, $type = 'primary', $icon = null)
    {
        $this->message = $message;
        $this->type = $type;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('breath::components.alert');
    }
}
