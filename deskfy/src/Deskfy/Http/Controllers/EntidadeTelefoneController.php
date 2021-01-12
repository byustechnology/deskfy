<?php

namespace Deskfy\Http\Controllers;

use App\Http\Controllers\Controller;
use Deskfy\Models\Entidade;
use Deskfy\Models\EntidadeTelefone;
use Deskfy\Filters\EntidadeTelefoneFilters;
use Deskfy\Http\Requests\EntidadeTelefoneRequest;
use Illuminate\Http\Request;

class EntidadeTelefoneController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Deskfy\Http\Requests\EntidadeTelefoneRequest  $request
     * @param  \Deskfy\Models\Entidade  $entidade
     * @return \Illuminate\Http\Response
     */
    public function store(EntidadeTelefoneRequest $request, Entidade $entidade)
    {
        $telefone = $entidade->telefones()->save(new EntidadeTelefone([
            'valor' => $request->valor, 
            'observacao' => $request->observacao
        ]));

        session()->flash('flash_success', 'Telefone ' . $telefone->valor . ' adicionado com sucesso na entidade <a href="' . url($entidade->path()) . '">' . $entidade->titulo . '</a>');
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Deskfy\Http\Requests\EntidadeTelefoneRequest  $request
     * @param  \Deskfy\Models\Entidade  $entidade
     * @param  \Deskfy\Models\EntidadeTelefone  $telefone
     * @return \Illuminate\Http\Response
     */
    public function update(EntidadeTelefoneRequest $request, Entidade $entidade, EntidadeTelefone $telefone)
    {
        $telefone->fill($request->all());
        $telefone->update();

        session()->flash('flash_success', 'Telefone ' . $telefone->valor . ' alterado com sucesso na entidade <a href="' . url($entidade->path()) . '">' . $entidade->titulo . '</a>');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Deskfy\Models\Entidade  $entidade
     * @param  \Deskfy\Models\EntidadeTelefone  $telefone
     * @return \Illuminate\Http\Response
     */
    public function destroy(Entidade $entidade, EntidadeTelefone $telefone)
    {
        $telefone->delete();
        session()->flash('flash_danger', 'Telefone ' . $telefone->valor . ' removido com sucesso da entidade <a href="' . url($entidade->path()) . '">' . $entidade->titulo . '</a>');
        return back();
    }
}
