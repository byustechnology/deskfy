<?php

namespace Breath\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Str;

class Input extends Component
{
    public $name;

    public $value;

    public $type;

    public $attribute;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $attribute, $value, $type)
    {
        $this->name = $name;
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
        if ($type == 'textarea') {
            return view('breath::components.textarea');
        }

        return view('breath::components.input');
    }
}
