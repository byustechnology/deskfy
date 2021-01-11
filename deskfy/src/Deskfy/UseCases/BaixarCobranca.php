<?php

namespace Deskfy\UseCases;

use Deskfy\Models\Cobranca;
use Deskfy\Exceptions\DeskfyException;

class BaixarCobranca
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
        if ( ! empty($cobranca->pago_em)) {
            throw new DeskfyException('A cobrança já foi baixada');
        }

        $cobranca->pago_em = $data ?? now();
        $cobranca->update();
    }
}
