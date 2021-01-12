<?php

namespace Breath\View\Components;

use Illuminate\View\Component;

class AttributeNumber extends Component
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
     * Defines the number 
     * of decimals.
     * 
     * @var string
     */
    public $decimal;

    /**
     * Defines a string 
     * to prepend the value.
     * 
     * @var string
     */
    public $prepend;

    /**
     * Defines a string 
     * to append the value.
     * 
     * @var string
     */
    public $append;

    /**
     * Defines the output 
     * string.
     * 
     * @var string
     */
    public $output;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $value, $decimal = 2, $prepend = null, $append = null)
    {
        $this->title = $title;
        $this->value = $value;
        $this->decimal = $decimal;

        $this->prepend = ! empty($prepend) ? $prepend . ' ' : $prepend;
        $this->append = ! empty($append) ? ' ' . $append : $append;

        $this->output = $this->prepend . number_format($this->value, $this->decimal, ',', '.') . $this->append;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('breath::components.attribute-number');
    }
}
