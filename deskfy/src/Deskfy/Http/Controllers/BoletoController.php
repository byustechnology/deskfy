<?php

namespace Deskfy\Http\Controllers;

use App\Http\Controllers\Controller;
use Deskfy\Models\Cobranca;
use Deskfy\Utils\Mask;
use Illuminate\Http\Request;

class BoletoController extends Controller
{
    public function __invoke()
    {

        $empresa = \Deskfy\Models\Empresa::first();
        $entidade = \Deskfy\Models\Entidade::first();
        $cobranca = $entidade->cobrancas()->first();
        $cobrancaBoleto = $cobranca->boletos()->first();

        $beneficiario = new \Eduardokum\LaravelBoleto\Pessoa([
            'nome'      => $empresa->titulo,
            'endereco'  => $empresa->endereco . ', N ' . $empresa->numero,
            'cep'       => Mask::make('#####-###', $empresa->cep),
            'uf'        => $empresa->estado,
            'cidade'    => $empresa->cidade,
            'documento' => Mask::make('##.###.###/####-##', $empresa->documento),
        ]);

        $pagador = new \Eduardokum\LaravelBoleto\Pessoa([
            'nome'      => $entidade->titulo,
            'endereco'  => $entidade->endereco . ', N ' . $entidade->numero,
            'cep'       => Mask::make('#####-###', $entidade->cep),
            'uf'        => $entidade->estado,
            'cidade'    => $entidade->cidade,
            'documento' => Mask::make('##.###.###/####-##', $entidade->documento),
        ]);

        $boleto = new \Eduardokum\LaravelBoleto\Boleto\Banco\Itau([
            'logo'                   => realpath(__DIR__ . '/../logos/') . DIRECTORY_SEPARATOR . '341.png',
            'dataVencimento'         => new \Carbon\Carbon(),
            'valor'                  => $cobrancaBoleto->cobranca->valor,
            'multa'                  => false,
            'juros'                  => false,
            'numero'                 => $cobrancaBoleto->numero,
            'numeroDocumento'        => $cobrancaBoleto->numero_documento,
            'pagador'                => $pagador,
            'beneficiario'           => $beneficiario,
            'diasBaixaAutomatica'    => 2,
            'carteira'               => 110,
            'agencia'                => $cobrancaBoleto->cobranca->empresa->agencia,
            'conta'                  => $cobrancaBoleto->cobranca->empresa->conta,
            'descricaoDemonstrativo' => ['demonstrativo 1', 'demonstrativo 2', 'demonstrativo 3'],
            'instrucoes'             => ['instrucao 1', 'instrucao 2', 'instrucao 3'],
            'aceite'                 => 'S',
            'especieDoc'             => 'DM',
        ]);

        $remessa = new \Eduardokum\LaravelBoleto\Cnab\Remessa\Cnab400\Banco\Itau([
            'agencia'      => $empresa->banco->agencia,
            'conta'        => $empresa->banco->conta,
            'contaDv'      => 9,
            'carteira'     => $empresa->banco->carteira,
            'beneficiario' => $beneficiario,
        ]);
        $remessa->addBoleto($boleto);
        echo $remessa->save(storage_path('app/') . 'itau.txt');

    }
}