<?php

namespace Deskfy\Http\Controllers;

use App\Http\Controllers\Controller;
use Deskfy\Models\Empresa;
use Deskfy\Filters\EmpresaFilters;
use Deskfy\Http\Requests\EmpresaRequest;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Deskfy\Filters\EmpresaFilters
     * @return \Illuminate\Http\Response
     */
    public function index(EmpresaFilters $filters)
    {
        $empresas = Empresa::filter($filters)->paginate();
        return view('deskfy::empresa.index', compact('empresas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('deskfy::empresa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Deskfy\Http\Requests\EmpresaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpresaRequest $request)
    {
        $empresa = (new Empresa)->fill($request->all());
        $empresa->save();

        session()->flash('flash_success', 'Empresa <a href="' . url($empresa->path()) . '">' . $empresa->titulo . '</a> criada com sucesso!');
        return redirect($empresa->path());
    }

    /**
     * Display the specified resource.
     *
     * @param  \Deskfy\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        return view('deskfy::empresa.show', compact('empresa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Deskfy\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa $empresa)
    {
        return view('deskfy::empresa.edit', compact('empresa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Deskfy\Http\Requests\EmpresaRequest  $request
     * @param  \Deskfy\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(EmpresaRequest $request, Empresa $empresa)
    {
        $empresa->fill($request->all());
        $empresa->update();

        session()->flash('flash_success', 'Empresa <a href="' . url($empresa->path()) . '">' . $empresa->titulo . '</a> alterada com sucesso!');
        return redirect($empresa->path());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Deskfy\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $empresa)
    {
        $empresa->delete();
        session()->flash('flash_danger', 'Empresa <a href="' . url($empresa->path()) . '">' . $empresa->titulo . '</a> removida com sucesso!');
        return back();
    }
}
