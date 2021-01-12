<?php

namespace Breath\View\Components;

use Illuminate\View\Component;

class Checkbox extends Component
{

    public $attribute;

    public $value;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($attribute)
    {
        $this->attribute = $attribute;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('breath::components.checkbox');
    }
}
