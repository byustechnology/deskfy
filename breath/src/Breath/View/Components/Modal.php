<?php

namespace Breath\View\Components;

use Illuminate\View\Component;

class Modal extends Component
{

    public $id;

    public $title;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $id)
    {
        $this->title = $title;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('breath::components.modal');
    }
}
