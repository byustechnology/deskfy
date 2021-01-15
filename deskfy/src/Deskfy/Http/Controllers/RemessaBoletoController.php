<?php

namespace Deskfy\Http\Controllers;

use App\Http\Controllers\Controller;
use Deskfy\Models\Remessa;
use Deskfy\Models\CobrancaBoleto;
use Deskfy\Exceptions\DeskfyException;
use Deskfy\Http\Requests\RemessaBoletoRequest;
use Illuminate\Http\Request;

class RemessaBoletoController extends Controller
{
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Deskfy\Http\Requests\RemessaBoletoRequest  $request
     * @param  \Deskfy\Models\Remessa  $remessa
     * @return \Illuminate\Http\Response
     */
    public function store(RemessaBoletoRequest $request, Remessa $remessa)
    {
        if ($remessa->boletos->count() > 10) {
            throw new DeskfyException('Desculpe, mas a remessa já possui 10 registros. Você deve criar uma nova remessa para atrelar os novos registros.');
        }

        $boletos = CobrancaBoleto::whereIn('id', $request->boletos)->update(['remessa_id' => $remessa->id]);
        session()->flash('flash_success', 'Boleto(s) adicionado(s) com sucesso na remessa ' . $remessa->titulo);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Deskfy\Models\Remessa  $remessa
     * @param  \Deskfy\Models\RemessaBoleto  $boleto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Remessa $remessa, CobrancaBoleto $boleto)
    {
        $boleto->remessa_id = null;
        $boleto->update();

        session()->flash('flash_danger', 'Boleto removido com sucesso da remessa ' . $remessa->titulo . '!');
        return back();
    }
}
