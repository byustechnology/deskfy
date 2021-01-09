<?php

namespace Breath\View\Components;

use Illuminate\View\Component;

class TableWithPagination extends Component
{

    public $resource;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($resource)
    {
        $this->resource = $resource;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('breath::components.table-with-pagination');
    }
}
