<?php

namespace Deskfy\Http\Controllers;

use App\Http\Controllers\Controller;
use Deskfy\Models\Empresa;
use Deskfy\Models\Remessa;
use Deskfy\UseCases\GerarBoleto;
use Deskfy\Utils\Mask;
use Eduardokum\LaravelBoleto\Pessoa;
use Eduardokum\LaravelBoleto\Cnab\Remessa\Cnab400\Banco\Itau as RemessaItau;
use Illuminate\Http\Request;

class RemessaArquivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Deskfy\Models\Remessa
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Remessa $remessa)
    {
        $boletos = $remessa->boletos;
        $empresa = Empresa::first();

        // Preparando os dados do beneficiário
        // e também da remessa.
        $beneficiario = new Pessoa([
            'nome'      => $empresa->titulo,
            'endereco'  => $empresa->endereco . ', N ' . $empresa->numero,
            'cep'       => Mask::make('#####-###', $empresa->cep),
            'uf'        => $empresa->estado,
            'cidade'    => $empresa->cidade,
            'documento' => Mask::make('##.###.###/####-##', $empresa->documento),
        ]);
        $arquivo = new RemessaItau([
            'agencia'      => $empresa->banco->agencia,
            'conta'        => $empresa->banco->conta,
            'contaDv'      => 9,
            'carteira'     => $empresa->banco->carteira,
            'beneficiario' => $beneficiario,
        ]);

        foreach($boletos as $boleto) {
            $pagador = new Pessoa([
                'nome'      => $boleto->cobranca->entidade->titulo,
                'endereco'  => $boleto->cobranca->entidade->endereco . ', N ' . $boleto->cobranca->entidade->numero,
                'cep'       => Mask::make('#####-###', $boleto->cobranca->entidade->cep),
                'uf'        => $boleto->cobranca->entidade->estado,
                'cidade'    => $boleto->cobranca->entidade->cidade,
                'documento' => Mask::make('##.###.###/####-##', $boleto->cobranca->entidade->documento),
            ]);
            
            // Objeto do boleto processado
            $arquivo->addBoleto(GerarBoleto::perform($boleto, $beneficiario, $pagador));
        }

        $arquivo->download(date('ym' . $remessa->id) . '.txt');
    }
}
