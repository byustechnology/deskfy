<?php

namespace Deskfy\UseCases;

use Carbon\Carbon;
use Deskfy\Models\CobrancaBoleto;
use Eduardokum\LaravelBoleto\Pessoa;
use Illuminate\Support\Str;

class GerarBoleto
{

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public static function perform(CobrancaBoleto $boleto, Pessoa $beneficiario, Pessoa $pagador)
    {
        return (new static)->handle($boleto, $beneficiario, $pagador);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(CobrancaBoleto $boleto, Pessoa $beneficiario, Pessoa $pagador)
    {
        $banco = Str::studly(Str::slug($boleto->cobranca->empresa->banco->titulo));
        $classe = '\Eduardokum\LaravelBoleto\Boleto\Banco\\' . $banco;

        return new $classe([
            'logo'                   => realpath(__DIR__ . '/../logos/') . DIRECTORY_SEPARATOR . '341.png',
            'dataVencimento'         => $boleto->cobranca->vence_em,
            'valor'                  => $boleto->cobranca->valor,
            'multa'                  => false,
            'juros'                  => false,
            'numero'                 => $boleto->numero,
            'numeroDocumento'        => $boleto->numero_documento,
            'pagador'                => $pagador,
            'beneficiario'           => $beneficiario,
            'diasBaixaAutomatica'    => 2,
            'carteira'               => $boleto->carteira,
            'agencia'                => $boleto->cobranca->empresa->agencia,
            'conta'                  => $boleto->cobranca->empresa->conta,
            'descricaoDemonstrativo' => ['demonstrativo 1', 'demonstrativo 2', 'demonstrativo 3'],
            'instrucoes'             => ['instrucao 1', 'instrucao 2', 'instrucao 3'],
            'aceite'                 => 'S',
            'especieDoc'             => 'DM',
        ]);
    }
}