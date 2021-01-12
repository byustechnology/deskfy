<?php

namespace Breath\View\Components;

use Illuminate\View\Component;

class Attribute extends Component
{
    /**
     * Defines the title of 
     * the attribute.
     * 
     * @var string
     */
    public $title;

    /**
     * Defines the value of 
     * the attribute.
     * 
     * @var string
     */
    public $value;
    
    /**
     * Defines the message that 
     * should be displayed if 
     * value is equal to null.
     * 
     * @var string
     */
    public $null;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $value, $null = 'Não informado')
    {
        $this->title = $title;
        $this->value = $value;
        $this->null = $null;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('breath::components.attribute');
    }
}
