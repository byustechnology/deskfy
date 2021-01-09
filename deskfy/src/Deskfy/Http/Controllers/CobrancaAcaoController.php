<?php

namespace Deskfy\Http\Controllers;

use App\Http\Controllers\Controller;
use Deskfy\Models\Cobranca;
use Deskfy\UseCases\BaixarCobranca;
use Deskfy\UseCases\GerarCobrancaRecorrente;
use Deskfy\Notifications\Entidade\CobrancaPaga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class CobrancaAcaoController extends Controller
{
    public function baixar(Cobranca $cobranca)
    {
        try {

            // Realiza a baixa da cobrança
            BaixarCobranca::perform($cobranca);
            $feedback = 'Cobrança baixada com sucesso.';

            // Verifica se devemos gerar novas cobranças
            // caso a atual seja recorrente
            if ($cobranca->recorrente) {
                $cobrancaRecorrente = GerarCobrancaRecorrente::perform($cobranca);
                $feedback .= ' Uma nova cobrança foi gerada com o vencimento definido para ' . $cobrancaRecorrente->vence_em->format('d/m/Y') . '. Deseja <a href="' . url($cobrancaRecorrente->path()) . '" target="_blank">visualizar</a>?';
            }

            // Envia uma notificação
            Notification::route('mail', 'john@john.com')
                ->notify(new CobrancaPaga($cobranca));

        } catch (Exception $e) {
            return back()->withErrors($e->getMessage());
        }

        session()->flash('flash_success', $feedback);
        return back();
    }
}
