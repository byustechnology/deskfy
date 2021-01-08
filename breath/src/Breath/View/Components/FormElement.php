<?php

namespace Breath\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Str;

class FormElement extends Component
{
    public $name;

    public $type;

    public $value;

    public $list;

    public $attribute;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $type = 'text', $value = null, $attribute = null, $list = null)
    {
        $this->name = $name;
        $this->type = $type;
        $this->value = $value;
        $this->list = $list;
        $this->attribute = $attribute ?? Str::snake(Str::slug($name, '_'));
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('breath::components.form-element');
    }
}
