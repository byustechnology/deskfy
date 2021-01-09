<?php

namespace Deskfy\Http\Controllers;

use App\Http\Controllers\Controller;
use Deskfy\Models\Cobranca;
use Deskfy\Models\CobrancaArquivo;
use Deskfy\Http\Requests\CobrancaArquivoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CobrancaArquivoController extends Controller
{
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Deskfy\Http\Requests\CobrancaArquivoRequest  $request
     * @param  \Deskfy\Models\Cobranca  $cobranca
     * @return \Illuminate\Http\Response
     */
    public function store(CobrancaArquivoRequest $request, Cobranca $cobranca)
    {
        foreach($request->file('arquivos') as $arquivo) {

            // Definindo um novo nome de arquivo.
            $nome = pathinfo($arquivo->getClientOriginalName());
            $nome = Str::slug($nome['filename']) . '-' . date('YmdHis') . '.' . Str::lower($nome['extension']);

            $caminho = $arquivo->storeAs('cobranca/' . $cobranca->entidade->documento . '/' . $cobranca->id, $nome);

            $cobranca->arquivos()->save(new CobrancaArquivo([
                'caminho' => Str::beforeLast($caminho, '/') . '/', 
                'arquivo' => Str::afterLast($caminho, '/'), 
                'observacao' => $request->observacao
            ]));
        }

        session()->flash('flash_success', 'Arquivo(s) adicionado(s) com sucesso na cobrança ' . $cobranca->titulo);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Deskfy\Models\Cobranca  $cobranca
     * @param  \Deskfy\Models\CobrancaArquivo  $arquivo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cobranca $cobranca, CobrancaArquivo $arquivo)
    {
        $arquivo->delete();
        session()->flash('flash_danger', 'Arquivo removido com sucesso da cobrança ' . $cobranca->titulo . '!');
        return back();
    }
}
