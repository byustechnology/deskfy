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
        'inicio', 
        'termino', 
        'enviadas', 
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
        return $this->builder->where('titulo', 'like', '%' . $auto . '%');
    }

    protected function inicio($inicio)
    {
        return $this->builder->where($this->request->data, '>=', $inicio);
    }

    protected function termino($termino)
    {
        return $this->builder->where($this->request->data, '<=', $termino);
    }

    protected function enviadas($enviadas)
    {
        if ($enviadas == 1) {
            return $this->builder->whereNotNull('enviada_em');
        }

        if ($envidas == 0) {
            return $this->builder->whereNull('enviada_em');
        }
    }

    protected function status($status)
    {
        if (in_array($status, ['abertas', 'pagas', 'vencidas'])) {
            return $this->builder->$status();
        }
    }

}