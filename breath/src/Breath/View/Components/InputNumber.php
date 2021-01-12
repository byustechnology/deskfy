<?php

namespace Breath\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Str;

class InputNumber extends Component
{
    public $attribute;

    public $value;

    public $label;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($attribute, $value = null, $label = null)
    {
        $this->value = $value;
        $this->attribute = $attribute;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('breath::components.input-number');
    }
}
