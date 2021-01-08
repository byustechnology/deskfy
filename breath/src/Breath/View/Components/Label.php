<?php

namespace Breath\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Str;

class Label extends Component
{
    public $name;

    public $attribute;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $attribute)
    {
        $this->name = $name;
        $this->attribute = $attribute;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('breath::components.label');
    }
}
