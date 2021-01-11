<?php

namespace Deskfy;

use Deskfy\Models\Cobranca;
use Deskfy\Exceptions\DeskfyException;

class BaixarCobranca
{
    protected $cobranca;

    public function __construct(Cobranca $cobranca)
    {
        $this->cobranca = $cobranca;
    }

    public function baixar($data = null)
    {
        if ( ! empty($this->cobranca->pago_em)) {
            throw new DeskfyException('A cobrança já foi baixada');
        }

        $this->cobranca->pago_em = $data ?? now();
        $this->cobranca->update();
    }
}