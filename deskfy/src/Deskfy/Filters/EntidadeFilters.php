<?php

namespace Deskfy\Filters;

class EntidadeFilters extends Filters
{
    /**
     * List of all avaliable filters.
     *
     * @var array
     */
    protected $filters = [
        'keyword',
        'auto', 
        'codigo', 
        'titulo', 
        'documento', 
        'responsavel', 
        'cidade', 
        'estado', 
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
        return $this->builder->where('titulo', 'like', '%' . $auto . '%')->orWhere('documento', 'like', '%' . $auto . '%');
    }

    protected function codigo($codigo)
    {
        return $this->builder->where('codigo', 'like', '%' . $codigo . '%');
    }

    protected function titulo($titulo)
    {
        return $this->builder->where('titulo', 'like', '%' . $titulo . '%');
    }

    protected function documento($documento)
    {
        return $this->builder->where('documento', 'like', '%' . $documento . '%');
    }

    protected function responsavel($responsavel)
    {
        return $this->builder->where('responsavel', 'like', '%' . $responsavel . '%');
    }

    protected function cidade($cidade)
    {
        return $this->builder->where('cidade', 'like', '%' . $cidade . '%');
    }

    protected function estado($estado)
    {
        return $this->builder->where('estado', 'like', '%' . $estado . '%');
    }

}