<?php

namespace Deskfy;

use Deskfy\Models\Cobranca;
use Carbon\Carbon;

class GerarCobrancasRecorrentes
{

    protected $cobranca;

    public function __construct(Cobranca $cobranca)
    {
        $this->cobranca = $cobranca;
    }

    public function gerar()
    {
        switch ($this->cobranca->repetir_a_cada_condicao) {
            case 'a': $repetir_a_cada_funcao = 'addYears'; break;
            case 'm': $repetir_a_cada_funcao = 'addMonths'; break;
            default: $repetir_a_cada_funcao = 'addDays'; break;
        }

        $proximaData = $this->cobranca->vence_em;
        $proximaData->$repetir_a_cada_funcao($this->cobranca->repetir_a_cada)->startOfDay();

        $cobranca = (new Cobranca)->fill($this->cobranca->makeHidden(['id', 'vence_em', 'pago_em'])->toArray());
        $cobranca->vence_em = $proximaData;
        $cobranca->save();

        return $cobranca;
    }
}