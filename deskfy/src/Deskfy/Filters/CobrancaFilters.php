<?php

namespace Deskfy\Filters;

class CobrancaFilters extends Filters
{
    /**
     * List of all avaliable filters.
     *
     * @var array
     */
    protected $filters = [
        'keyword',
        'auto',
        'status', 
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

    protected function status($status)
    {
        if (in_array($status, ['abertas', 'pagas', 'vencidas'])) {
            return $this->builder->$status();
        }
    }

}