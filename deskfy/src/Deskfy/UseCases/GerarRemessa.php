<?php

namespace Deskfy\UseCases;

use Deskfy\Models\Cobranca;
use Deskfy\Exceptions\DeskfyException;

class GerarRemessa
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
        $cobranca->enviada_em = $data ?? now();
        $cobranca->update();
    }
}
