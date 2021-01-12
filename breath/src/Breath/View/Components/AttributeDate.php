<?php

namespace Breath\View\Components;

use Illuminate\View\Component;
use Carbon\Carbon;

class AttributeDate extends Component
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
     * Defines the date 
     * display format.
     * 
     * @var string
     */
    public $format;
    
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
    public function __construct($title, $value, $format = 'd/m/Y', $null = 'Não informado')
    {
        $this->title = $title;

        // Check if value is a valid date, then try to parse it
        $this->value = strtotime($value) ? Carbon::parse($value) : null;
        $this->format = $format;
        $this->null = $null;

        if ( ! is_null($this->value)) {
            $this->value = $this->value->format('d/m/Y') . ', ' . $this->value->diffForHumans();
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('breath::components.attribute-date');
    }
}
