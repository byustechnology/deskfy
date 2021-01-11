<?php

namespace Deskfy\Http\Controllers;

use App\Http\Controllers\Controller;
use Deskfy\Models\Cobranca;
use Deskfy\UseCases\EnviarCobranca;
use Deskfy\UseCases\BaixarCobranca;
use Deskfy\UseCases\GerarCobrancaRecorrente;
use Deskfy\Notifications\Entidade\CobrancaDisponivel;
use Deskfy\Notifications\Entidade\CobrancaPaga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class CobrancaAcaoController extends Controller
{

    /**
     * Envia a cobrança para uma 
     * determinada entidade.
     * @param  \Illuminate\Http\Request  $request
     * @param  \Deskfy\Models\Cobranca  $cobranca
     * @return \Illuminate\Http\Response
     */
    public function enviar(Request $request, Cobranca $cobranca)
    {

        // Retorna os e-mails em formato de array.
        $destinatarios = explode(';', str_replace(' ', '', $request->destinatarios));

        // Valida os e-mails enviados pelo usuário.
        validator()->make(['destinatarios' => $destinatarios], [
            'destinatarios.*' => 'email|required',
        ], [
            'destinatarios.*.email' => 'O e-mail :input não é válido.',
            'destinatarios.*.required' => 'Existem e-mails não preenchidos no seu formulário (consulte entre os ;): ' . $request->destinatarios,
        ])->validate();


        try {
            EnviarCobranca::perform($cobranca);
            Notification::route('mail', $destinatarios)
                ->notify(new CobrancaDisponivel($cobranca));

        } catch (Exception $e) {
            return back()->withErrors($e->getMessage());
        }

        session()->flash('flash_success', 'Cobranca enviada com sucesso para os e-mails: ' . implode(', ', $destinatarios));
        return back();
    }

    /**
     * Baixa a cobrança, definindo que a mesma 
     * foi paga.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \Deskfy\Models\Cobranca  $cobranca
     * @return \Illuminate\Http\Response
     */
    public function baixar(Request $request, Cobranca $cobranca)
    {  
        // Validação da entrada do usuário.
        $request->validate(['pago_em' => 'required|date']);

        try {

            // Realiza a baixa da cobrança
            BaixarCobranca::perform($cobranca, $request->pago_em);
            $feedback = 'Cobrança baixada com sucesso.';

            // Verifica se devemos gerar novas cobranças
            // caso a atual seja recorrente
            if ($cobranca->recorrente) {
                $cobrancaRecorrente = GerarCobrancaRecorrente::perform($cobranca);
                $feedback .= ' Uma nova cobrança foi gerada com o vencimento definido para ' . $cobrancaRecorrente->vence_em->format('d/m/Y') . '. Deseja <a href="' . url($cobrancaRecorrente->path()) . '" target="_blank">visualizar</a>?';
            }

            if ($request->has('notificar')) {
                Notification::route('mail', $cobranca->entidade->emails()->pluck('valor')->toArray())
                    ->notify(new CobrancaPaga($cobranca, $cobrancaRecorrente ?? null));
            }
            

        } catch (Exception $e) {
            return back()->withErrors($e->getMessage());
        }

        session()->flash('flash_success', $feedback);
        return back();
    }
}
