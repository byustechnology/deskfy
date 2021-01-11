<?php

namespace Breath\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Str;

class Input extends Component
{
    public $attribute;

    public $value;

    public $type;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($attribute, $value, $type)
    {
        $this->value = $value;
        $this->type = $type;
        $this->attribute = $attribute;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('breath::components.input');
    }
}
