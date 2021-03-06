<?php

namespace Deskfy\Http\Controllers;

use App\Http\Controllers\Controller;
use Deskfy\Models\Cobranca;
use Deskfy\UseCases\GerarBoleto;
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

        $boleto = GerarBoleto::perform($cobrancaBoleto, $beneficiario, $pagador);

        $remessa = new \Eduardokum\LaravelBoleto\Cnab\Remessa\Cnab400\Banco\Itau([
            'agencia'      => $empresa->banco->agencia,
            'conta'        => $empresa->banco->conta,
            'contaDv'      => 9,
            'carteira'     => $empresa->banco->carteira,
            'beneficiario' => $beneficiario,
        ]);
        $remessa->addBoleto($boleto);
        echo $remessa->save(storage_path('app/') . 'remessa/' . date('Ymd') . '.txt');

        // Gerar PDF do boleto
        $pdf = new \Eduardokum\LaravelBoleto\Boleto\Render\Pdf;
        $pdf->addBoleto($boleto);
        $pdf->gerarBoleto($pdf::OUTPUT_SAVE, storage_path('app/') . 'boleto/' . 'test.pdf');

    }
}