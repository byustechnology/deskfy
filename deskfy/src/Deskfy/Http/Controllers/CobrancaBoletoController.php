<?php

namespace Deskfy\Http\Controllers;

use App\Http\Controllers\Controller;
use Deskfy\Models\Cobranca;
use Deskfy\Models\CobrancaBoleto;
use Deskfy\UseCases\GerarBoleto;
use Deskfy\Utils\Mask;
use Deskfy\Http\Requests\CobrancaBoletoRequest;
use Eduardokum\LaravelBoleto\Pessoa;
use Eduardokum\LaravelBoleto\Boleto\Render\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CobrancaBoletoController extends Controller
{
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Deskfy\Http\Requests\CobrancaBoletoRequest  $request
     * @param  \Deskfy\Models\Cobranca  $cobranca
     * @return \Illuminate\Http\Response
     */
    public function store(CobrancaBoletoRequest $request, Cobranca $cobranca)
    {
        $boleto = CobrancaBoleto::firstOrNew([
            'cobranca_id' => $cobranca->id, 
            'numero' => $cobranca->id, 
            'carteira' => 109, 
            'numero_documento' => $cobranca->id
        ]);
        $boleto->save();
        
        $empresa = $cobranca->empresa;
        $entidade = $cobranca->entidade;
        
        $beneficiario = new Pessoa([
            'nome'      => $empresa->titulo,
            'endereco'  => $empresa->endereco . ', N ' . $empresa->numero,
            'cep'       => Mask::make('#####-###', $empresa->cep),
            'uf'        => $empresa->estado,
            'cidade'    => $empresa->cidade,
            'documento' => Mask::make('##.###.###/####-##', $empresa->documento),
        ]);

        $pagador = new Pessoa([
            'nome'      => $entidade->titulo,
            'endereco'  => $entidade->endereco . ', N ' . $entidade->numero,
            'cep'       => Mask::make('#####-###', $entidade->cep),
            'uf'        => $entidade->estado,
            'cidade'    => $entidade->cidade,
            'documento' => Mask::make('##.###.###/####-##', $entidade->documento),
        ]);

        $boletoObjeto = GerarBoleto::perform($boleto, $beneficiario, $pagador);
        $caminho = 'boleto/boleto-n' . $boleto->numero . '.pdf';

        $pdf = new Pdf;
        $pdf->addBoleto($boletoObjeto);
        $pdf->gerarBoleto($pdf::OUTPUT_SAVE, storage_path('app/') . $caminho);
        
        $boleto->caminho = $caminho;
        $boleto->arquivo = Str::afterLast($caminho, '/');
        $boleto->update();

        session()->flash('flash_success', 'Boleto(s) adicionado(s) com sucesso na cobrança ' . $cobranca->titulo);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Deskfy\Models\Cobranca  $cobranca
     * @param  \Deskfy\Models\CobrancaBoleto  $boleto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cobranca $cobranca, CobrancaBoleto $boleto)
    {
        $boleto->delete();
        session()->flash('flash_danger', 'Boleto removido com sucesso da cobrança ' . $cobranca->titulo . '!');
        return back();
    }
}
