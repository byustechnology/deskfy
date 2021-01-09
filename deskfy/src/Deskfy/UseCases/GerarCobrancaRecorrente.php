<?php

namespace Deskfy\UseCases;

use Carbon\Carbon;
use Deskfy\Models\Cobranca;

class GerarCobrancaRecorrente
{

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public static function perform(Cobranca $cobranca)
    {
        return (new static)->handle($cobranca);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Cobranca $cobranca)
    {
        switch ($cobranca->repetir_a_cada_condicao) {
            case 'a': $repetir_a_cada_funcao = 'addYears'; break;
            case 'm': $repetir_a_cada_funcao = 'addMonths'; break;
            default: $repetir_a_cada_funcao = 'addDays'; break;
        }

        $proximaData = $cobranca->vence_em;
        $proximaData->$repetir_a_cada_funcao($cobranca->repetir_a_cada)->startOfDay();

        // Cria a cobrança recorrente
        $recorrente = (new Cobranca)->fill($cobranca->makeHidden(['id', 'vence_em', 'pago_em'])->toArray());
        $recorrente->vence_em = $proximaData;
        $recorrente->save();
        
        return $recorrente;
    }
}