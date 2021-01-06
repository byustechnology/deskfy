<?php

namespace Deskfy\Filters;

class EmpresaFilters extends Filters
{
    /**
     * List of all avaliable filters.
     *
     * @var array
     */
    protected $filters = [
        'keyword',
        'auto',
    ];

    /**
     * Search by keyword on a given field
     * 
     */
    protected function keyword($keyword)
    {
        $campo = $this->request->campo;
        $this->$campo($keyword);
    }

    protected function auto($auto)
    {
        // ...
    }

}