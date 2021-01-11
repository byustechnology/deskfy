<?php

namespace Deskfy\Http\Controllers;

use App\Http\Controllers\Controller;
use Deskfy\Models\Entidade;
use Deskfy\Models\EntidadeEmail;
use Deskfy\Filters\EntidadeEmailFilters;
use Deskfy\Http\Requests\EntidadeEmailRequest;
use Illuminate\Http\Request;

class EntidadeEmailController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Deskfy\Http\Requests\EntidadeEmailRequest  $request
     * @param  \Deskfy\Models\Entidade  $entidade
     * @return \Illuminate\Http\Response
     */
    public function store(EntidadeEmailRequest $request, Entidade $entidade)
    {
        $email = $entidade->emails()->save(new EntidadeEmail([
            'valor' => $request->valor, 
            'observacao' => $request->observacao, 
        ]));

        session()->flash('flash_success', 'E-mail ' . $email->valor . ' adicionado com sucesso na entidade <a href="' . url($entidade->path()) . '">' . $entidade->titulo . '</a>');
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Deskfy\Http\Requests\EntidadeEmailRequest  $request
     * @param  \Deskfy\Models\Entidade  $entidade
     * @param  \Deskfy\Models\EntidadeEmail  $email
     * @return \Illuminate\Http\Response
     */
    public function update(EntidadeEmailRequest $request, Entidade $entidade, EntidadeEmail $email)
    {
        $email->fill($request->all());
        $email->update();

        session()->flash('flash_success', 'E-mail ' . $email->valor . ' alterado com sucesso na entidade <a href="' . url($entidade->path()) . '">' . $entidade->titulo . '</a>');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Deskfy\Models\Entidade  $entidade
     * @param  \Deskfy\Models\EntidadeEmail  $email
     * @return \Illuminate\Http\Response
     */
    public function destroy(Entidade $entidade, EntidadeEmail $email)
    {
        $email->delete();
        session()->flash('flash_danger', 'E-mail ' . $email->valor . ' removido com sucesso da entidade <a href="' . url($entidade->path()) . '">' . $entidade->titulo . '</a>');
        return back();
    }
}
