<?php

namespace Breath\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Str;

class Select extends Component
{
    public $value;

    public $type;

    public $list;

    public $attribute;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($attribute, $value, $list)
    {
        $this->value = $value;
        $this->list = $list;
        $this->attribute = $attribute;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('breath::components.select');
    }
}
