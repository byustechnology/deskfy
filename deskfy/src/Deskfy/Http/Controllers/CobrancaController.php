<?php

namespace Deskfy\Http\Controllers;

use App\Http\Controllers\Controller;
use Deskfy\Models\Cobranca;
use Deskfy\Filters\CobrancaFilters;
use Deskfy\Http\Requests\CobrancaRequest;
use Illuminate\Http\Request;

class CobrancaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Deskfy\Filters\CobrancaFilters
     * @return \Illuminate\Http\Response
     */
    public function index(CobrancaFilters $filters)
    {
        $cobrancas = Cobranca::filter($filters)->paginate();
        return view('deskfy::cobranca.index', compact('cobrancas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('deskfy::cobranca.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Deskfy\Http\Requests\CobrancaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CobrancaRequest $request)
    {
        $cobranca = (new Cobranca)->fill($request->all());
        $cobranca->save();

        session()->flash('flash_success', 'Cobranca <a href="' . url($cobranca->path()) . '">' . $cobranca->titulo . '</a> criada com sucesso!');
        return redirect($cobranca->path());
    }

    /**
     * Display the specified resource.
     *
     * @param  \Deskfy\Models\Cobranca  $cobranca
     * @return \Illuminate\Http\Response
     */
    public function show(Cobranca $cobranca)
    {
        return view('deskfy::cobranca.show', compact('cobranca'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Deskfy\Models\Cobranca  $cobranca
     * @return \Illuminate\Http\Response
     */
    public function edit(Cobranca $cobranca)
    {
        return view('deskfy::cobranca.edit', compact('cobranca'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Deskfy\Http\Requests\CobrancaRequest  $request
     * @param  \Deskfy\Models\Cobranca  $cobranca
     * @return \Illuminate\Http\Response
     */
    public function update(CobrancaRequest $request, Cobranca $cobranca)
    {
        $cobranca->fill($request->all());
        $cobranca->update();

        session()->flash('flash_success', 'Cobranca <a href="' . url($cobranca->path()) . '">' . $cobranca->titulo . '</a> alterada com sucesso!');
        return redirect($cobranca->path());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Deskfy\Models\Cobranca  $cobranca
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cobranca $cobranca)
    {
        $cobranca->delete();
        session()->flash('flash_danger', 'Cobranca <a href="' . url($cobranca->path()) . '">' . $empresa->titulo . '</a> removida com sucesso!');
        return back();
    }
}
