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
    public static function perform(Cobranca $cobranca, $paga_em = null)
    {
        return (new static)->handle($cobranca, $paga_em);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Cobranca $cobranca, $paga_em = null)
    {
        if ( ! empty($cobranca->paga_em)) {
            throw new DeskfyException('A cobrança já foi baixada');
        }

        $cobranca->paga_em = $paga_em ?? now();
        $cobranca->update();
    }
}
